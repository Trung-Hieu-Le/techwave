<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//TODO: phân quyền admin có thể sửa, xóa... (chỉ có user, admin mà ko có nv?)
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
        $err = '';
        if (!empty($request->username) && !empty($request->password)) {
            $user = DB::table('users')
                ->where('username', '=', $request->username)
                ->where('password', '=', $request->password)
                ->whereNot('role','=','user')
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
                return redirect('/admin/login');
            }
        } catch (\Exception $e) {
            return abort(404);
        }
    }


    public function page_user()
    {
        $courses = DB::table('courses')->get()->toArray();
        return view('admin.user.them_user',compact('courses'));
    }
    public function insert_user(Request $request)
    {

        $rs = DB::table('users')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'display_name' => $request->full_name,
            'email' => $request->email == null ? "" : $request->email,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
            'role' => $request->quyen,
        ]);
        
        if ($rs == true) {
            return redirect('/admin/index-user');
        } else {
            $err = 'Vui lòng kiểm tra lại thông tin';
            return view('admin.user.them_user', compact('err'));
        }
    }


    public function page_edit_user(Request $request)
    {
        $user = DB::table('users')
            ->where("users.id", '=', $request->id)
            ->get()->toArray()[0];
        $courses = DB::table('courses')->get()->toArray();

        return view('admin.user.edit_user', compact('user','courses'));
    }

    public function edit_user(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses) && ($request->session()->get('role')[0] == 'admin')
        ) {

            $rs = DB::table('users')
            ->where('users.ID', '=', $request->id)
            ->update([
                'username' => $request->username,
                'password' => $request->password,
                'display_name' => $request->full_name,
                'email' => $request->email == null ? "" : $request->email,
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
                'role' => $request->quyen,
            ]);

            return redirect()->route('index_user');
        } else {
            return redirect('/admin/login');
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function delete_user(Request $request)
    {

        $ses = $request->session()->get('tk_user');
        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table("comments")->where('id_user', '=', $request->id)->delete();
            DB::table("invoices")->where('id_user', '=', $request->id)->delete();
            DB::table('users')->where('users.id', '=', $request->id)->delete();
        }
        return redirect()->back();
    }

    public function find_user(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_user = DB::table('users')
                    ->where('display_name', 'like', '%' . $search_text . '%')
                    ->orderBy('users.id', 'desc')
                    ->paginate(15);
                    Session::put('tasks_url', $request->fullUrl());
                return view('admin.user.list_user', compact('ds_user', 'search_text'));
            } else {
                return redirect('/admin/index-user');
            }
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
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
