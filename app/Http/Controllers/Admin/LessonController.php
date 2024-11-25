<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    public function indexLesson(Request $request)
    {
        //        try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            //                $index = 1;
            $ds_lesson = DB::table('lessons')
                ->select('lessons.id', 'lessons.created_at', 'lessons.lesson_title', 'lessons.video_id', 'courses.name as courseName', 'users.display_name as author_name')
                ->join('lesson_relationships', 'lesson_relationships.id_lesson', 'lessons.id')
                ->join('courses', 'lesson_relationships.id_course', 'courses.id')
                ->leftJoin('users', 'users.id', 'lessons.id_author')
                ->orderBy('lessons.id', 'desc')
                ->paginate(15);
            Session::put('tasks_url', $request->fullUrl());
            return view("admin.khoahoc.danh_sach_bai_giang", compact('ds_lesson'));
        } else {
            return redirect('/admin/login');
        }
    }

    public function themLesson()
    {

        //    try {
        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        $courses = DB::table('courses')->select("id", 'name')->get()->toArray();
        return view('admin.khoahoc.them_bai_giang', compact("users", "courses"));
        //    } catch (\Exception $e) {
        //        return abort(404);
        //    }
    }
    public function insertLesson(Request $request)
    {
        // try {    
        $request->tieu_de = preg_replace('/\s+/', " ", $request->tieu_de);
        DB::table('lessons')->insert([
            'lesson_title' => $request->lesson_title,
            'video_id' => $request->video_id,
            'id_author' => $request->tac_gia,
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
        ]);
        $rs = DB::table('lessons')->select("id")->orderBy("id", "desc")->first();
        DB::table('lesson_relationships')->insert([
            'id_course' => $request->khoa_hoc,
            'id_lesson' => $rs->id,
        ]);

        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        $courses = DB::table('courses')->select("id", 'name')->get()->toArray();
        return redirect()->route('them_lesson', compact("users"));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
    public function pageEditLesson(Request $request)
    {
        // try {
        $lesson_detail = DB::table('lessons')
            ->select('lessons.id', 'lessons.lesson_title', 'lessons.id_author', 'lessons.video_id', 'courses.id  as courseID', 'courses.name as courseName')
            ->join('lesson_relationships', 'lesson_relationships.id_lesson', 'lessons.id')
            ->join('courses', 'lesson_relationships.id_course', 'courses.id')
            ->where("lessons.id", '=', $request->id)
            ->first();

        $users = DB::table('users')->select("id", 'username', "display_name")->whereNot('role', 'user')->get()->toArray();
        $courses = DB::table('courses')->select("id", 'name')->get()->toArray();
        return view('admin.khoahoc.sua_bai_giang', compact('lesson_detail', 'courses', 'users'));
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }

    public function editLesson(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');

        if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'nv')) {
            // if (strpos($request->video_id, 'http') !== false) {
            //     $url_parts = parse_url($request->video_id);
            //     $video_id = '';
            //     if (isset($url_parts['query'])) {
            //         parse_str($url_parts['query'], $query_params);
            //         if (isset($query_params['v'])) {
            //             $video_id = $query_params['v'];
            //         }
            //     }
            //     if (!$video_id && isset($url_parts['path'])) {
            //         $path_parts = explode('/', $url_parts['path']);
            //         $path_parts_count = count($path_parts);
            //         if ($path_parts[0] == 'video' && $path_parts_count >= 2) {
            //             $video_id = $path_parts[$path_parts_count - 1];
            //         } elseif ($path_parts_count >= 1) {
            //             $video_id = $path_parts[$path_parts_count - 1];
            //         }
            //         if ($path_parts_count >= 2 && $path_parts[$path_parts_count - 2] == 'watch') {
            //             $video_id = $path_parts[$path_parts_count - 1];
            //         }
            //     }
            // } else {
            //     $video_id = $request->video_id;
            // }

            $request->tieu_de = preg_replace('/\s+/', " ", $request->tieu_de);

            DB::table('lessons')
                ->where('lessons.id', '=', $request->id)
                ->update([
                    'lesson_title' => $request->lesson_title,
                    'video_id' => $request->video_id,
                    'id_author' => $request->tac_gia,
                    'updated_at' => date('y-m-d h:i:s'),
                ]);

            DB::table('lesson_relationships')
                ->where('id_lesson', '=', $request->id)
                ->update([
                    'id_course' => $request->khoa_hoc,
                ]);

            return redirect()->route('index_lesson');
        } else {
            return redirect('/admin/login');
        }
        // } catch (\Exception $e) {
        //     return redirect(session("tasks_url"));
        // }
    }

    public function deleteLesson($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('lesson_relationships')->where('id_lesson', '=', $id)->delete();
            DB::table('lessons')->where('id', '=', $id)->delete();
        }
        return redirect()->back();
    }
    public function findLesson(Request $request)
    {
        // try {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                $search_text = $_GET['s'];
                $ds_lesson = DB::table('lessons')
                    ->select('lessons.id', 'lessons.created_at', 'lessons.lesson_title', 'lessons.video_id', 'courses.name as courseName', 'users.display_name as author_name')
                    ->join('lesson_relationships', 'lesson_relationships.id_lesson', 'lessons.id')
                    ->join('courses', 'lesson_relationships.id_course', 'courses.id')
                    ->leftJoin('users', 'users.id', 'lessons.id_author')
                    ->where('lessons.lesson_title', 'like', '%' . $search_text . '%')
                    ->orderBy('lessons.id', 'desc')
                    ->paginate(15);
                Session::put('tasks_url', $request->fullUrl());
                return view("admin.khoahoc.danh_sach_bai_giang", compact('ds_lesson', 'search_text'));
            } else {
                return redirect('/admin/index-lesson');
            }
        }
        // } catch (\Exception $e) {
        //     return abort(404);
        // }
    }
}
