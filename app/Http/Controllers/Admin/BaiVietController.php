<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BaiVietController extends Controller
{
    public function index()
    {
        //        return view('admin.layout_admin.layout_admin');
    }
    public function danhSachBaiViet(Request $request)
    {
        //        try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            //                $index = 1;
            $ds_bai_viet = DB::table('posts')
                ->select(
                    'posts.ID',
                    'posts.post_date',
                    'posts.post_content',
                    'posts.post_title',
                    'posts.post_image',
                    'posts.slug',
                    'posts.post_view',
                    'users.display_name as author_name'
                )
                ->leftJoin('users', 'users.id', 'posts.post_author')
                ->orderBy('posts.ID', 'desc')
                ->paginate(15);


            Session::put('tasks_url', $request->fullUrl());
            return view("admin.tintuc.danh_sach_bai_viet", compact('ds_bai_viet'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function pageImport()
    {
        $category = DB::table('hwp_terms')->get()->toArray();
        $tutorial_categories = DB::table('hwp_tutorial_categories')
            ->get()->toArray();
        return view('admin.tintuc.import_bai_viet', compact('category', 'tutorial_categories'));
    }

    public function themBaiViet()
    {

        //    try {

        $users = DB::table('users')->select("ID", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        $post_categories = DB::table('post_categories')
            ->get()->toArray();
        return view('admin.tintuc.them_bai_viet', compact("users", 'post_categories'));
        //    } catch (\Exception $e) {
        //        return abort(404);
        //    }
    }
    public function luuBaiViet(Request $request)
    {
        // try {
        // $markupFixer  = new \TOC\MarkupFixer();
        // $contentWithMenu = $markupFixer->fix($request->noi_dung);
        if ($request->has('image_upload')) {
            $file_image = $request->file('image_upload');
            $ext = $request->file('image_upload')->extension();
            $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
            // $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
            $path = public_path('images/') . $name_image;
            // $file_image->save($path);
            $file_image->move(public_path('images'), $name_image);
        }

        $request->tieu_de = preg_replace('/\s+/', " ", $request->tieu_de);
        DB::table('posts')->insert([
            'post_title' => $request->tieu_de,
            'post_content' => $request->noi_dung,
            'post_author' => $request->tac_gia,
            'slug' => $request->post_name,
            'description' => $request->mo_ta,
            'post_image' =>  URL::to('') . '/images/' . $name_image,
            'post_date' => date('y-m-d h:i:s'),
            'comment_count' => '0',
            'category' => $request->huong_dan,
        ]);


        return redirect()->route('indexBV');
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
    public function suaBaiViet(Request $request)
    {
        // try {

        $post_detail = DB::table('posts')
            ->select(
                'posts.ID',
                'posts.post_title',
                'posts.slug',
                'posts.description',
                'posts.category',
                'posts.post_author',
                'posts.post_date',
                'posts.post_content',
                'posts.post_image'
            )
            ->where("posts.ID", '=', $request->id)
            ->first();
        $users = DB::table('users')->select("ID", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        $post_categories = DB::table('post_categories')
            ->get()->toArray();
        $comments = DB::table('comments')
            ->select('comments.id', 'content', 'report_count', 'display_name', 'comments.created_at', 'show', 'id_parent')
            ->join('users', 'users.id', 'comments.id_user')
            ->where('id_post', $request->id)
            ->get()->groupBy('id_parent');
        return view('admin.tintuc.sua_bai_viet', compact('post_detail', 'users', 'post_categories', 'comments'));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function updateBaiViet(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');

        if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'nv')) {
            $request->tieu_de = preg_replace('/\s+/', " ", $request->tieu_de);
            if ($request->has('image_upload')) {
                $file_image = $request->file('image_upload');
                $ext = $request->file('image_upload')->extension();
                $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
                // $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
                $path = public_path('images/') . $name_image;
                // $img->save($path);
                $file_image->move(public_path('images'), $name_image);
                DB::table('posts')
                    ->where('posts.ID', '=', $request->id)
                    ->update([
                        'post_title' => $request->tieu_de,
                        'post_content' => $request->noi_dung,
                        'post_author' => $request->tac_gia,
                        'slug' => $request->post_name,
                        'description' => $request->mo_ta,
                        'post_image' =>  URL::to('') . '/images/' . $name_image,
                        'post_date' => date('y-m-d h:i:s'),
                        'comment_count' => '0',
                        'category' => $request->huong_dan,
                    ]);
            } else {
                DB::table('posts')
                    ->where('posts.ID', '=', $request->id)
                    ->update([
                        'post_title' => $request->tieu_de,
                        'post_content' => $request->noi_dung,
                        'post_author' => $request->tac_gia,
                        'slug' => $request->post_name,
                        'description' => $request->mo_ta,
                        'post_date' => date('y-m-d h:i:s'),
                        'comment_count' => '0',
                        'category' => $request->huong_dan,
                    ]);
            }


            if (session("tasks_url")) {
                return redirect(session("tasks_url"));
            }
            return redirect()->route('indexBV');
        } else {
            return redirect('/admin/login');
        }
        // } catch (\Exception $e) {
        //     return redirect(session("tasks_url"));
        // }
    }
    public function xoaBaiViet($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('posts')->where('id', '=', $id)->delete();
        }
        return redirect()->back();
    }

    public function timBaiViet(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_bai_viet = DB::table('posts')
                    ->select(
                        'posts.ID',
                        'posts.post_date',
                        'posts.post_content',
                        'posts.post_title',
                        'posts.post_image',
                        'posts.slug',
                        'posts.post_view',
                        'users.display_name as author_name'
                    )
                    ->leftJoin('users', 'users.id', 'posts.post_author')
                    ->where('posts.post_title', 'like', '%' . $search_text . '%')
                    ->orderBy('posts.ID', 'desc')
                    ->paginate(15);
                Session::put('tasks_url', $request->fullUrl());
                return view("admin.tintuc.danh_sach_bai_viet", compact('ds_bai_viet', 'search_text'));
            } else {
                return redirect('/admin/trang-chu');
            }
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function toggleCommentShow($id)
    {
        $comment = DB::table('comments')->where('id', $id)->first();

        if ($comment) {
            $newShowStatus = !$comment->show;
            DB::table('comments')->where('id', $id)->update(['show' => $newShowStatus]);

            return response()->json(['success' => true, 'show' => $newShowStatus]);
        }

        return response()->json(['success' => false]);
    }
    public function deleteComment($id)
    {
        $deleted = DB::table('comments')->where('id', $id)->delete();

        return response()->json(['success' => $deleted ? true : false]);
    }
}
