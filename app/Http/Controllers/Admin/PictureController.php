<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PictureController extends Controller
{
    public function index()
    {
        //        return view('admin.layout_admin.layout_admin');
    }
    public function indexPicture(Request $request)
    {
        //        try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            //                $index = 1;
            $ds_pictures = DB::table('pictures')
                ->orderBy('id', 'desc')
                ->simplePaginate(15);
            Session::put('tasks_url', $request->fullUrl());
            return view("admin.picture.danh_sach_picture", compact('ds_pictures'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function themPicture()
    {
        //    try {
        //Công nghệ
        // $posts = DB::table('soft_wares')
        //     ->select('soft_wares.id', 'soft_wares.created_at', 'soft_wares.post_content', 'soft_wares.post_title', 'soft_wares.post_name')
        //     ->orderBy('soft_wares.id', 'desc')
        //     ->get()->toArray();
        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();

        return view('admin.picture.them_picture', compact("users"));
        //    } catch (\Exception $e) {
        //        return abort(404);
        //    }
    }
    public function insertPicture(Request $request)
    {
        // try {
        // $markupFixer  = new \TOC\MarkupFixer();
        // $contentWithMenu = $markupFixer->fix($request->noi_dung);
        $name_image = '';
        if ($request->has('image_upload')) {
            $file_image = $request->file('image_upload');
            $ext = $request->file('image_upload')->extension();
            // $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
            $name_image = $request->ten_anh . '.' . $ext;
            // $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
            $path = public_path("image/TrangChu/head_carousel") . "." . $name_image;
            $file_image->move(public_path("image/TrangChu/head_carousel"), $name_image);
        }
        DB::table('pictures')->insert([
            'picture_name' => $request->ten_anh,
            'id_author' => $request->tac_gia,
            'picture_type' => $request->phan_loai,
            'picture_image' =>  URL::to('') . '/image/TrangChu/head_carousel/' . $name_image,
        ]);

        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        return redirect()->route('them_picture', compact("users"));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
    public function pageEditPicture(Request $request)
    {
        // try {
        // $posts = DB::table('soft_wares')
        //     ->select('soft_wares.id', 'soft_wares.created_at', 'soft_wares.post_content', 'soft_wares.post_title', 'soft_wares.post_name')
        //     ->orderBy('soft_wares.ID', 'desc')
        //     ->get()->toArray();
        $picture_detail = DB::table('pictures')
            ->where("id", '=', $request->id)
            ->first();
        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        return view('admin.picture.sua_picture', compact('picture_detail', 'users'));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function editPicture(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');

        if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'nv')) {
            if ($request->has('image_upload')) {
                $file_image = $request->file('image_upload');
                $ext = $request->file('image_upload')->extension();
                // $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
                $name_image = $request->ten_anh . '.' . $ext;
                // $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
                $path = public_path("image/TrangChu/head_carousel") . "." . $name_image;
                $file_image->move(public_path("image/TrangChu/head_carousel"), $name_image);
                // $file_image->move(public_path('images'), $name_image);
                DB::table('pictures')
                    ->where('pictures.id', '=', $request->id)
                    ->update([
                        'picture_name' => $request->ten_anh,
                        'id_author' => $request->tac_gia,
                        'picture_type' => $request->phan_loai,
                        'picture_image' =>  URL::to('') . '/image/TrangChu/head_carousel/' . $name_image,
                    ]);
            } else {
                DB::table('pictures')
                    ->where('pictures.id', '=', $request->id)
                    ->update([
                        'picture_name' => $request->ten_anh,
                        'id_author' => $request->tac_gia,
                        'picture_type' => $request->phan_loai,
                    ]);
            }

            return redirect()->route('index_picture');
        } else {
            return redirect('/admin/login');
        }
        // } catch (\Exception $e) {
        //     return redirect(session("tasks_url"));
        // }
    }

    public function deletePicture($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            $imageToDelete = DB::table('pictures')->where('id', '=', $id)->first();
            $parseUrl = parse_url($imageToDelete->picture_image)['path'];
            $fullPath = public_path($parseUrl);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            DB::table('pictures')->where('id', '=', $id)->delete();
        }
        return redirect()->back();
    }
    //TODO: search nhiều lĩnh vực, cho các loại find khác nữa
    public function findPicture(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_pictures = DB::table('pictures')
                    ->where('picture_name', 'like', '%' . $search_text . '%')
                    ->orderBy('id', 'desc')
                    ->simplePaginate(15);
                Session::put('tasks_url', $request->fullUrl());
                return view("admin.picture.danh_sach_picture", compact('ds_pictures', 'search_text'));

            } else {
                return redirect('/admin/index-picture');
            }
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
}
