<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function view_login(Request $request)
    {
        try {
            return view('admin.user.login');
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    public function action_login(Request $request)
    {
        try {
            $err = '';
            if (!empty($request->username) && !empty($request->password)) {
                $user = DB::table('users')
                    ->where('username', '=', $request->username)
                    ->where('password', '=', $request->password)
                    ->whereNot('role', '=', 'user')
                    ->get()->toArray();
                if (count($user) == 1) {
                    $request->session()->push('tk_user', $request->username);
                    $request->session()->push('role', $user[0]->role);
                    return redirect('/admin/trang-chu');
                } else {
                    $err = "Sai tài khoản hoặc mật khẩu";
                    return view('admin.user.login', compact('err'));
                }
            }
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    public function index_user(Request $request)
    {
        try {
            $ses = $request->session()->get('tk_user');
            if (isset($ses)) {
                $ds_user = DB::table('users')
                    ->orderBy('users.id', 'desc')
                    ->paginate(15);
                return view('admin.user.list_user', compact('ds_user'));
            } else {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
        } catch (\Exception $e) {
            return abort(404);
        }
    }


    public function page_user()
    {
        try {
            if (!session()->has('tk_user')) {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
            $courses = DB::table('courses')->get()->toArray();
            return view('admin.user.them_user', compact('courses'));
        } catch (\Exception $e) {
            return abort(404);
        }
    }
    //TODO: mật khẩu bị mã hóa ko biết vì sao
    public function insert_user(Request $request)
    {
        try {
            if (!session()->has('tk_user')) {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
            $existingUser = DB::table('users')
            ->where('username', $request->username)
            ->orWhere('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->first();
            if ($existingUser) {
                return redirect()->back()->with('fail', 'Username, email hoặc số điện thoại đã tồn tại!');
            }
            if ($request->has('image_upload')) {
                $file_image = $request->file('image_upload');
                $ext = $request->file('image_upload')->extension();
                $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
                // $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
                $path = public_path('images/') . $name_image;
                // $file_image->save($path);
                $file_image->move(public_path('images'), $name_image);
            }
            //TODO: sử dụng insertGetId ở đây
            $rs = DB::table('users')->insert([
                'username' => $request->username,
                'password' => $request->password,
                'display_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email == null ? "" : $request->email,
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
                'role' => $request->quyen,
                'avatar' =>  URL::to('') . '/images/' . $name_image,

            ]);
            if ($request->favorite_courses) {
                $rs = DB::table('users')->select("id")->orderBy("id", "desc")->first();
                foreach ($request->favorite_courses as $key) {
                    DB::table('favorite_courses')->insert([
                        'id_user' => $rs->id,
                        'id_course' => $key,
                    ]);
                }
            }
            return redirect('/admin/index-user')->with('success', 'Thêm tài khoản thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra khi thêm tài khoản!' . $e->getMessage());
        }
    }


    public function page_edit_user(Request $request)
    {
        try {
            if (!session()->has('tk_user')) {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
            $user = DB::table('users')
                ->where("users.id", '=', $request->id)
                ->get()->toArray()[0];
            $courses = DB::table('courses')->get()->toArray();
            $favorite_courses = DB::table('favorite_courses')->where('id_user', $user->id)->get()->toArray();
            return view('admin.user.edit_user', compact('user', 'courses', 'favorite_courses'));
        } catch (\Exception $e) {
            return abort(404);
        }
    }
    //TODO: kiểm tra full password; trùng email, sđt
    public function edit_user(Request $request)
    {
        try {
            $ses = $request->session()->get('tk_user');
            if (
                isset($ses) && ($request->session()->get('role')[0] == 'admin')
            ) {
                $existingUser = DB::table('users')
                    ->where(function ($query) use ($request) {
                        $query->where('username', $request->username)
                            ->orWhere('email', $request->email)
                            ->orWhere('phone', $request->phone);
                    })
                    ->whereNot('id', $request->id)
                    ->first();
                if ($existingUser) {
                    return redirect()->back()->with('fail', 'Username, email hoặc số điện thoại đã tồn tại!');
                }

                if ($request->has('image_upload')) {
                    $file_image = $request->file('image_upload');
                    $ext = $request->file('image_upload')->extension();
                    $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
                    // $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
                    $path = public_path('images/') . $name_image;
                    // $img->save($path);
                    $file_image->move(public_path('images'), $name_image);

                    DB::table('users')
                        ->where('users.id', '=', $request->id)
                        ->update([
                            'username' => $request->username,
                            'password' => $request->password,
                            'display_name' => $request->full_name,
                            'phone' => $request->phone,
                            'email' => $request->email == null ? "" : $request->email,
                            'created_at' => date('y-m-d h:i:s'),
                            'updated_at' => date('y-m-d h:i:s'),
                            'role' => $request->quyen,
                            'avatar' =>  URL::to('') . '/images/' . $name_image,
                        ]);
                } else {
                    DB::table('users')
                        ->where('users.id', '=', $request->id)
                        ->update([
                            'username' => $request->username,
                            'password' => $request->password,
                            'display_name' => $request->full_name,
                            'phone' => $request->phone,
                            'email' => $request->email == null ? "" : $request->email,
                            'created_at' => date('y-m-d h:i:s'),
                            'updated_at' => date('y-m-d h:i:s'),
                            'role' => $request->quyen,
                        ]);
                }
                if ($request->favorite_courses) {
                    DB::table('favorite_courses')->where('id_user', $request->id)->delete();
                    foreach ($request->favorite_courses as $key) {
                        DB::table('favorite_courses')->insert([
                            'id_user' => $request->id,
                            'id_course' => $key,
                        ]);
                    }
                }
                return redirect()->route('index_user')->with('success', 'Sửa tài khoản thành công!');
            } else {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra khi sửa tài khoản này!');
        }
    }

    public function delete_user(Request $request)
    {
        try {
            $ses = $request->session()->get('tk_user');
            if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
                DB::table("comments")->where('id_user', '=', $request->id)->delete();
                DB::table("invoices")->where('id_user', '=', $request->id)->delete();
                DB::table('users')->where('users.id', '=', $request->id)->delete();
                return redirect()->back()->with('success', 'Xóa tài khoản thành công!');
            } else {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra khi xóa tài khoản!');
        }
    }

    public function find_user(Request $request)
    {
        try {
            $ses = $request->session()->get('tk_user');
            if (isset($ses)) {
                if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                    $search_text = $_GET['s'];
                    $ds_user = DB::table('users')
                        ->where('display_name', 'like', '%' . $search_text . '%')
                        ->orWhere('username', 'like', '%' . $search_text . '%')
                        ->orWhere('email', 'like', '%' . $search_text . '%')
                        ->orWhere('phone', 'like', '%' . $search_text . '%')
                        ->orWhere('role', 'like', '%' . $search_text . '%')
                        ->orderBy('users.id', 'desc')
                        ->paginate(15);
                    Session::put('tasks_url', $request->fullUrl());
                    return view('admin.user.list_user', compact('ds_user', 'search_text'));
                } else {
                    return redirect('/admin/index-user');
                }
            } else {
                $err = 'Hết phiên đăng nhập, vui lòng đăng nhập lại!';
                return redirect('/admin/login')->with('err', $err);
            }
        } catch (\Exception $e) {
            return abort(404);
        }
    }

    public function indexLogout()
    {
        try {
            session()->forget('tk_user');
            session()->forget('role');
            return redirect('admin/login');
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }
}
