<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TermKhoaHocController extends Controller
{

    public function indexTermsKhoaHoc(Request $request)
    {
//        try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
//                $index = 1;
            $ds_terms_khoa_hoc = DB::table('course_categories')
                ->orderBy('course_categories.id', 'desc')
                ->paginate(15);
            Session::put('tasks_url', $request->fullUrl());
            return view("admin.khoahoc.danh_sach_terms_khoa_hoc", compact('ds_terms_khoa_hoc'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function themTermKhoaHoc()
    {

    //    try {
            return view('admin.khoahoc.them_term_khoa_hoc');
    //    } catch (\Exception $e) {
    //        return abort(404);
    //    }
    }
    public function insertTermKhoaHoc(Request $request)
    {
        // try {
            // $markupFixer  = new \TOC\MarkupFixer();
            // $contentWithMenu = $markupFixer->fix($request->noi_dung);


            DB::table('course_categories')->insert([
                'name' => $request->term_name,
                'slug' => $request->term_slug,
            ]);
            return redirect()->route('index_terms_KH');
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
    public function pageEditTermKhoaHoc(Request $request)
    {
        // try {
        $term_detail = DB::table('course_categories')
            ->where("course_categories.id", '=', $request->id)
            ->first();
        
        return view('admin.khoahoc.sua_term_khoa_hoc', compact('term_detail'));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function editTermKhoaHoc(Request $request)
    {
        // try {
            $ses = $request->session()->get('tk_user');

            if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'nv')) {
                
                DB::table('course_categories')
                    ->where("course_categories.id", '=', $request->id)
                    ->update([
                        'name' => $request->term_name,
                        'slug' => $request->term_slug,        
                    ]);
                

                return redirect()->route('index_terms_KH');
            } else {
                return redirect('/admin/login');
            }
        // } catch (\Exception $e) {
        //     return redirect(session("tasks_url"));
        // }
    }

    public function deleteTermKhoaHoc($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('courses')->where('category', '=', $id)->delete();
            DB::table('course_categories')->where('course_categories.id', '=', $id)->delete();
        }
        return redirect()->back();
    }

    public function findTermKhoaHoc(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_terms_khoa_hoc = DB::table('course_categories')
                ->where('name', 'like', '%' . $search_text . '%')
                ->orderBy('course_categories.id', 'desc')
                    ->paginate(15);
                Session::put('tasks_url', $request->fullUrl());
                return view("admin.khoahoc.danh_sach_terms_khoa_hoc", compact('ds_terms_khoa_hoc', 'search_text'));
            } else {
                return redirect('/admin/index-terms-khoa-hoc');
            }
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
}
