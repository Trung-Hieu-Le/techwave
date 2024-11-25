<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TermHuongDanController extends Controller
{

    public function indexTermsHuongDan(Request $request)
    {
        //        try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            //                $index = 1;
            $ds_terms_huong_dan = DB::table('post_categories')
                ->orderBy('post_categories.id', 'desc')
                ->paginate(15);
            Session::put('tasks_url', $request->fullUrl());
            return view("admin.tintuc.danh_sach_terms_huong_dan", compact('ds_terms_huong_dan'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function themTermHuongDan()
    {

        //    try {
        return view('admin.tintuc.them_term_huong_dan');
        //    } catch (\Exception $e) {
        //        return abort(404);
        //    }
    }
    public function insertTermHuongDan(Request $request)
    {
        // try {
        // $markupFixer  = new \TOC\MarkupFixer();
        // $contentWithMenu = $markupFixer->fix($request->noi_dung);


        DB::table('post_categories')->insert([
            'name' => $request->term_name,
            'slug' => $request->term_slug,
        ]);
        return redirect()->route('index_terms_HD');
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
    public function pageEditTermHuongDan(Request $request)
    {
        // try {
        $term_detail = DB::table('post_categories')
            ->where("post_categories.id", '=', $request->id)
            ->first();

        return view('admin.tintuc.sua_term_huong_dan', compact('term_detail'));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function editTermHuongDan(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');

        if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'nv')) {

            DB::table('post_categories')
                ->where("post_categories.id", '=', $request->id)
                ->update([
                    'name' => $request->term_name,
                    'slug' => $request->term_slug,
                ]);


            return redirect()->route('index_terms_HD');
        } else {
            return redirect('/admin/login');
        }
        // } catch (\Exception $e) {
        //     return redirect(session("tasks_url"));
        // }
    }

    public function deleteTermHuongDan($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('posts')->where('category', '=', $id)->delete();
            DB::table('post_categories')->where('post_categories.id', '=', $id)->delete();
        }
        return redirect()->back();
    }
    public function findTermHuongDan(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_terms_huong_dan = DB::table('post_categories')
                    ->where('name', 'like', '%' . $search_text . '%')
                    ->orderBy('post_categories.id', 'desc')
                    ->paginate(15);
                Session::put('tasks_url', $request->fullUrl());
                return view("admin.tintuc.danh_sach_terms_huong_dan", compact('ds_terms_huong_dan', 'search_text'));
            } else {
                return redirect('/admin/index-terms-huong-dan');
            }
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
}
