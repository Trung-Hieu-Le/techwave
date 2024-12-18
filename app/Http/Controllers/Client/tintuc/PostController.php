<?php

namespace App\Http\Controllers\Client\tintuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function post_detail($post_name)
    {
        try {
            $post = DB::table('posts')
                ->select('id', 'post_title', 'post_date', 'post_content', 'post_view', 'comment_count', 'category')
                ->where('slug', '=', $post_name)->first();
            $commentCount = DB::table('comments')
                ->where('id_post', $post->id)
                ->where('show', 1)
                ->count();

            DB::table('posts')
                ->where('id', $post->id)
                ->update(['comment_count' => $commentCount]);


            // DB::table('posts')->where('id', $post->id)->increment('post_view');

            $list_chu_de_noi_bat = DB::table("posts")
                ->select('posts.slug', 'posts.post_title', 'posts.description', 'posts.post_image')
                ->orderBy('post_view', 'desc')
                ->limit(5)
                ->get()->toArray();
            $list_post_lien_quan = DB::table('posts')->whereNot('slug', '=', $post_name)
                ->where('category', $post->category)
                ->orderBy('id', 'desc')->limit(6)->get()->toArray();

            $comments = DB::table('comments')
                ->select('comments.id', 'content', 'display_name', 'comments.created_at', 'avatar', 'id_user', 'show')
                ->join('users', 'users.id', 'comments.id_user')
                ->where('id_post', $post->id)
                ->whereNull('id_parent')
                ->get()->toArray();
            foreach ($comments as &$comment) {
                $replies = DB::table('comments')
                    ->select('comments.id', 'content', 'display_name', 'comments.created_at', 'avatar', 'id_user', 'show')
                    ->join('users', 'users.id', 'comments.id_user')
                    ->where('id_parent', $comment->id)
                    ->get()->toArray();
                $comment->replies = $replies;
            }
            if (!request()->cookie($post_name)) {
                DB::table('posts')->where('id', $post->id)->increment('post_view');
                return response(view('client.body.xdsoft.tintuc.post_detail', compact('post', 'list_post_lien_quan', 'list_chu_de_noi_bat', 'comments')))
                    ->cookie($post_name, true, 900);
            }

            return view('client.body.xdsoft.tintuc.post_detail', compact('post', 'list_chu_de_noi_bat', 'list_post_lien_quan', 'comments'));
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    public function addComment(Request $request)
    {
        try {
            $ses = $request->session()->get('account_id');
            if (isset($ses)) {
                DB::table('comments')->insert([
                    'id_post' => $request->id_post,
                    'id_user' => $request->id_user,
                    'content' => $request->content,
                    'show' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
            } else {
                $err = 'Vui lòng đăng nhập để thực hiện tác vụ này!';
                return redirect('/login')->with('err', $err);
            }
        } catch (\Throwable $th) {
            return back()->with('fail', 'Bình luận chưa được gửi: '. $th->getMessage());
        }
    }

    public function replyComment(Request $request)
    {
        try {
            $ses = $request->session()->get('account_id');
            if (isset($ses)) {
                $originalParentId = DB::table('comments')
                    ->where('id', $request->id_parent)
                    ->value('id_parent');
                $parentId = $originalParentId ? $originalParentId : $request->id_parent;

                DB::table('comments')->insert([
                    'id_post' => $request->id_post,
                    'id_parent' => $parentId,
                    'id_user' => $request->id_user,
                    'content' => $request->content,
                    'show' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
            } else {
                $err = 'Vui lòng đăng nhập để thực hiện tác vụ này!';
                return redirect('/login')->with('err', $err);
            }
        } catch (\Throwable $th) {
            return back()->with('fail', 'Bình luận chưa được gửi: '. $th->getMessage());
        }
    }

    public function reportComment(Request $request)
    {
        try {
            $ses = $request->session()->get('account_id');
            if (isset($ses)) {
                $commentId = $request->input('id');
                $cookieKey = "reported_comment_{$commentId}";

            if ($request->cookie($cookieKey)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn đã báo cáo bình luận này. Vui lòng thử lại sau 24 giờ.'
                ]);
            }
                DB::table('comments')
                    ->where('id', $commentId)
                    ->increment('report_count');
                return response()->json(['success' => true, 'message' => 'Bình luận đã được báo cáo thành công.'])->cookie($cookieKey, true, 1440);;
                // return response()->json(['message' => 'Bình luận đã được báo cáo.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập để báo cáo bình luận này.']);
                // return redirect('/login')->with('err', $err);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi báo cáo bình luận: '. $th->getMessage()]);
        }
    }
}
