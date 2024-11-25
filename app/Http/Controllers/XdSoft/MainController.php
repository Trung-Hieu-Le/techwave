<?php

namespace App\Http\Controllers\XdSoft;

use App\Http\Controllers\Controller;
use App\Models\Intros;
use App\Models\MainPost;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\SoftWare;
use App\Models\SubPosts;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function homepage()
    {

        $head_carousels = cache()->remember('home-head_carousels', 60, function () {
            return glob('image/TrangChu/head_carousel/*');
        });
        asort($head_carousels);

        $khoa_hoc=DB::table('courses')
        ->orderBy('created_at', 'desc')
        ->limit(4)->get()->toArray();
        $post = DB::table("posts")
            ->select('posts.slug', 'posts.post_title', 'posts.description', 'posts.post_image', 'posts.post_date')
            ->limit(5)->orderBy('post_date', 'desc')->get()->toArray();

        return view('client.body.xdsoft.home', compact( 'post', 'head_carousels', 'khoa_hoc'));
    }

    public function dichvu()
    {
        return view('client.body.xdsoft.gioithieu.dichvu');
    }

    public function camnhan()
    {
        return view('client.body.xdsoft.gioithieu.camnhan');
    }

    public function khoahoc(Request $request)
    {
        $userId = $request->session()->get('account_id');
        $categorySlug = $request->input('course_category');
        $keyword = $request->input('keyword');
        $sortBy = $request->input('sort_by');
        $coursesQuery = DB::table('courses');

        if ($categorySlug) {
            $category = DB::table('course_categories')->where('slug', $categorySlug)->first();
            if ($category) {
                $coursesQuery->where('category', $category->id);
            }
        }
        if ($keyword) {
            $coursesQuery->where('name', 'like', "%$keyword%");
        }
        if ($sortBy === 'newest') {
            $coursesQuery->orderBy('created_at', 'desc');
        } elseif ($sortBy === 'most_watch') {
            $coursesQuery->orderBy('view_count', 'desc');
        }
        $courses = $coursesQuery->get()->toArray();

        $freeCourses = [];
        $paidCourses = [];
        foreach ($courses as $course) {
            $lesson_count = DB::table('lessons')
                ->join('lesson_relationships', 'lesson_relationships.id_lesson', 'lessons.id')
                ->where('id_course', $course->id)->count();
            $author_course = DB::table('users')->where('id', $course->id_author)->first();
            $average_rate = DB::table('comments')
                ->where('id_course', $course->id)
                ->whereNotNull('rate')
                ->where('show', 1)
                ->avg('rate');
            $course->lesson_count = $lesson_count;
            $course->author_course = $author_course;
            $course->average_rate = $average_rate;

            DB::table('courses')
                ->where('id', $course->id)
                ->update(['average_rate' => $average_rate]);
            
            $course->bought = DB::table('invoices')
            ->join('invoice_relationships', 'invoice_relationships.id_invoice', 'invoices.id')
            ->where('invoices.id_user', $userId)
            ->where('invoices.trang_thai', "Đã thanh toán")
            ->where('invoice_relationships.id_course', $course->id)
            ->exists();
            if ($course->gia_giam == 0) {
                $freeCourses[] = $course;
            } elseif ($course->gia_giam > 0) {
                $paidCourses[] = $course;
            }
        }
        $ds_category = DB::table('course_categories')
            ->select('course_categories.*')
            ->join('courses', 'course_categories.id', '=', 'courses.category')
            ->groupBy('course_categories.id')
            ->get()->toArray();
        return view('client.body.xdsoft.khoahoc', compact('freeCourses', 'paidCourses', 'ds_category'));
    }

    public function dohoa(Request $request)
    {
        $commentsCount = DB::table('comments')
            ->select('id_post', DB::raw('COUNT(*) as count'))
            ->where('show', 1)
            ->groupBy('id_post')
            ->get();
        foreach ($commentsCount as $comment) {
            DB::table('posts')
                ->where('id', $comment->id_post)
                ->update(['comment_count' => $comment->count]);
        }

        $query = DB::table("posts")
            ->select('posts.slug', 'posts.post_title', 'posts.description', 'posts.post_image', 'post_date')
            ->join('post_categories', 'post_categories.id', '=', 'posts.category')
            ->whereNotNull('posts.category');
        if (!empty($request->cur_category)) {
            $query->where('post_categories.slug', $request->cur_category);
        }
        if (!empty($request->keyword)) {
            $query->where('posts.post_title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->sort_by == 'newest') {
            $query->orderBy('post_date', 'desc');
        } elseif ($request->sort_by == 'popular') {
            $query->orderBy('post_view', 'desc');
        } else {
            $query->orderBy('post_date', 'desc');
        }
        $post = $query->paginate(10);
        $list_chu_de_noi_bat = DB::table("posts")
            ->select('posts.slug', 'posts.post_title', 'posts.description', 'posts.post_image')
            ->limit(10)
            ->orderBy('post_view', 'desc')
            ->get()->toArray();

        $cur_category = null;

        $ds_category = DB::table('post_categories')
            ->select('post_categories.*')
            ->join('posts', 'post_categories.id', '=', 'posts.category')
            ->groupBy('post_categories.id')
            ->get()->toArray();

        return view('client.body.xdsoft.tintuc.dohoa', compact('post', 'list_chu_de_noi_bat', 'cur_category', 'ds_category'));
    }


    public function cart()
    {
        $current_user = DB::table('users')->where('display_name', session('account_name'))->first();
        if (!session()->has('account_id') || empty($current_user)) {
            return redirect("/login");
        }
        $invoice = DB::table('invoices')
            ->where('id_user', session('account_id'))
            ->where('trang_thai', 'Chưa mua')
            ->orderBy('id', 'desc')
            ->first();

        $cartItems = collect([]);
        if ($invoice) {
            $cartItems = DB::table('invoice_relationships')
                ->join('courses', 'invoice_relationships.id_course', '=', 'courses.id')
                ->where('invoice_relationships.id_invoice', $invoice->id)
                ->select(
                    'courses.id as cart_item_id',
                    'courses.name',
                    'courses.img',
                    'courses.gia_giam',
                    'courses.gia_goc'
                )
                ->get();
        }
        return view("client.body.xdsoft.cart", compact('current_user', 'invoice', 'cartItems'));
    }

    public function insert_bao_gia(Request $request)
    {
        try {
            DB::table('advices')->insert([
                'thong_tin' => $request->data_description,
                'tinh_thanh' => $request->data_province,
                'ho_ten' => $request->data_name,
                'phone' => $request->data_phone,
                'id_user' => session('account_id')
            ]);

            // return redirect()->back()->withCookie(cookie('form_submitted', 'true', 30));
            return redirect()->back();
        } catch (\Exception $e) {
            return abort(404);
        }
    }
}
