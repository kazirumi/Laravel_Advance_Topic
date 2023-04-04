<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use App\QueryFilters\Even;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class PostController extends Controller
{
    public function create(){
        //$channels=Channel::all();

//        return view('post.create',compact('channels'));
        return view('post.create');
    }

    //pipeline example
    public function index(){
        //        $posts=DB::table('posts')
//               ->select(DB::raw('id , title'))
//               ->whereRaw('MOD(id, 2) = '.request('even'))
//               ->orderBy('title','desc')
//               ->get();
       // $posts=Post::query();

        //dd($posts->get());

//        if(request()->has('even'))
//            $posts=$posts->whereRaw('MOD(id, 2) = '.request('even'));
//
//        if(request()->has('sort'))
//            $posts=$posts->orderBy('title',request('sort'));

//        $posts=$posts->get();
        //dd($posts);

        $posts=Post::AllPosts();

        return view('post.index',compact('posts'));
    }
}
