<?php

namespace App\Http\Controllers\Client\dohoa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SoftWare;

class PostController extends Controller
{

    public function tutorial_cate($cur_category){
        // $post = DB::table('hwp_tutorial_categories')->where('name','=',$post_name)->first();
        // $list_tutorial_noi_bat = DB::table('hwp_tutorials')
        // ->whereNot('slug','=',$post->id)
        // ->limit(4)->get()->toArray();
        // return view('client.body.xdsoft.phanmem.post_detail',compact('post','list_tutorial_noi_bat'));
        
        $ds_category = DB::table('post_categories')
        ->select('post_categories.*')
        ->join('posts','post_categories.id','=','posts.category')
        ->groupBy('post_categories.id')
        ->get()->toArray();
        
        $post = DB::table('posts')
        // ->whereNot('slug','=',$post->id)
        ->join('post_categories','post_categories.id','=','posts.category')
        ->where('posts.category','!=',null)
        ->where('post_categories.slug',$cur_category)
        ->orderBy('posts.id', "desc")
        ->paginate(10);

        $list_chu_de_noi_bat = DB::table("posts")
            ->select('posts.slug', 'posts.post_title', 'posts.description', 'posts.post_image')
            ->limit(10)
            ->orderBy('post_view', 'desc')
            ->get()->toArray();

        

        return view('client.body.xdsoft.bàiviet', compact('list_chu_de_noi_bat','cur_category','ds_category','post'));
    }
}
