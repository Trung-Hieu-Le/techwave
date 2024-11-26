<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KhoaHocController extends Controller
{
    public function indexKhoaHoc(Request $request)
    {
        //        try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            //                $index = 1;
            $ds_khoa_hoc = DB::table('courses')
                ->select(
                    'courses.id',
                    'courses.created_at',
                    'courses.name',
                    'courses.img',
                    'courses.gia_giam',
                    'slug',
                    'users.display_name as author_name'
                )
                ->leftJoin('users', 'users.id', 'courses.id_author')
                ->orderBy('courses.id', 'desc')
                ->paginate(15);
            Session::put('tasks_url', $request->fullUrl());
            return view("admin.khoahoc.danh_sach_khoa_hoc", compact('ds_khoa_hoc'));
        } else {
            return redirect('/admin/login');
        }
    }
    //TODO: tên slug khóa học phải độc nhất ko trùng 
    public function themKhoaHoc()
    {

        //    try {
        $lessons = DB::table('lessons')->select("id", 'lesson_title')->get()->toArray();
        $course_categories = DB::table('course_categories')
            ->get()->toArray();
        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        return view('admin.khoahoc.them_khoa_hoc', compact("users", "lessons", 'course_categories'));
        //    } catch (\Exception $e) {
        //        return abort(404);
        //    }
    }
    public function insertKhoaHoc(Request $request)
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
        DB::table('courses')->insert([
            'name' => $request->tieu_de,
            'slug' => $request->slug,
            'content' => $request->noi_dung,
            'id_author' => $request->tac_gia,
            'description' => $request->mo_ta,
            'gia_goc' => $request->gia_goc,
            'gia_giam' => $request->gia_giam,
            'img' =>  URL::to('') . '/images/' . $name_image,
            'category' => $request->category,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
        ]);
        if ($request->lessons) {
            $rs = DB::table('courses')->select("id")->orderBy("id", "desc")->first();
            foreach ($request->lessons as $key) {
                DB::table('lesson_relationships')->insert([
                    'id_course' => $rs->id,
                    'id_lesson' => $key,
                ]);
            }
        }
        return redirect()->route('index_khoa_hoc');
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
    public function pageEditKhoaHoc(Request $request)
    {
        // try {
        $course_detail = DB::table('courses')
            ->select(
                'courses.id',
                'courses.created_at',
                'courses.name',
                'courses.content',
                'courses.id_author',
                'courses.img',
                'courses.description',
                'courses.slug',
                'gia_goc',
                'gia_giam',
                'category'
            )
            ->where("courses.id", '=', $request->id)
            ->first();
        $lessons = DB::table('lessons')->select('id', 'lesson_title')->get()->toArray();
        $lesson_detail = DB::table('lesson_relationships')->where('id_course', '=', $request->id)->get()->toArray();
        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        $course_categories = DB::table('course_categories')
            ->get()->toArray();
        $comments = DB::table('comments')
            ->select('comments.id', 'content', 'rate', 'display_name', 'comments.created_at', 'show')
            ->join('users', 'users.id', 'comments.id_user')
            ->where('id_course', $request->id)
            ->get()->toArray();
        return view('admin.khoahoc.sua_khoa_hoc', compact('course_detail', 'lessons', 'lesson_detail', 'users', 'course_categories', 'comments'));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function editKhoaHoc(Request $request)
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
                DB::table('courses')
                    ->where('courses.id', '=', $request->id)
                    ->update([
                        'name' => $request->tieu_de,
                        'slug' => $request->slug,
                        'content' => $request->noi_dung,
                        'id_author' => $request->tac_gia,
                        'description' => $request->mo_ta,
                        'gia_goc' => $request->gia_goc,
                        'gia_giam' => $request->gia_giam,
                        'category' => $request->category,
                        'img' =>  URL::to('') . '/images/' . $name_image,
                        'updated_at' => date('y-m-d h:i:s'),
                    ]);
            } else {
                DB::table('courses')
                    ->where('courses.id', '=', $request->id)
                    ->update([
                        'name' => $request->tieu_de,
                        'slug' => $request->slug,
                        'content' => $request->noi_dung,
                        'id_author' => $request->tac_gia,
                        'description' => $request->mo_ta,
                        'gia_goc' => $request->gia_goc,
                        'gia_giam' => $request->gia_giam,
                        'category' => $request->category,
                        'updated_at' => date('y-m-d h:i:s'),
                    ]);
            }

            DB::table("lesson_relationships")->where('id_course', '=', $request->id)->delete();
            if ($request->lessons) {
                foreach ($request->lessons as $key) {
                    DB::table('lesson_relationships')->insert([
                        'id_course' => $request->id,
                        'id_lesson' => $key,
                    ]);
                }
            }

            return redirect()->route('index_khoa_hoc');
        } else {
            return redirect('/admin/login');
        }
        // } catch (\Exception $e) {
        //     return redirect(session("tasks_url"));
        // }
    }

    public function deleteKhoaHoc($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('invoice_relationships')->where('id_course', '=', $id)->delete();
            DB::table('lesson_relationships')->where('id_course', '=', $id)->delete();
            DB::table('courses')->where('id', '=', $id)->delete();
        }
        return redirect()->back();
    }
    public function findKhoaHoc(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_khoa_hoc = DB::table('courses')
                    ->select(
                        'courses.id',
                        'courses.created_at',
                        'courses.name',
                        'courses.img',
                        'courses.gia_giam',
                        'slug',
                        'users.display_name as author_name'
                    )
                    ->leftJoin('users', 'users.id', 'courses.id_author')
                    ->where('courses.name', 'like', '%' . $search_text . '%')
                    ->orderBy('courses.id', 'desc')
                    ->paginate(15);
                Session::put('tasks_url', $request->fullUrl());
                return view("admin.khoahoc.danh_sach_khoa_hoc", compact('ds_khoa_hoc', 'search_text'));
            } else {
                return redirect('/admin/index-khoa-hoc');
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
