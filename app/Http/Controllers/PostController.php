<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post,Category $category)
    {
        $management1=$post->where('category_id','1')->get()->count();
        $management2=$post->where('category_id','2')->get()->count();
        $management3=$post->where('category_id','3')->get()->count();
        $management4=$post->where('category_id','4')->get()->count();
        return view('posts.index')->with([
    
            'posts'=> $post ->get(),
            'management1'=> $management1,
            'management2'=> $management2,
            'management3'=> $management3,
            'management4'=> $management4,
            ]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
   
    public function store(Post $post,Category $category, Request $request) // 引数をRequestからPostRequestにする
    {  
        $input =  $request['post'];
        $input['user_id']=Auth::id();
        $post->fill($input)->save();
        $management1=$post->where('category_id','1')->get()->count();
        $management2=$post->where('category_id','2')->get()->count();
        $management3=$post->where('category_id','3')->get()->count();
        $management4=$post->where('category_id','4')->get()->count();
        return view('posts.index')->with([
            'posts' => $post->orderBy('updated_at','DESC')->get(),
            'management1'=> $management1,
            'management2'=> $management2,
            'management3'=> $management3,
            'management4'=> $management4,
            ]);
    }
    public function edit(Post $post)
    {
        return view('posts.edit')->with([
            'post' => $post,
            ]);
    }
    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/index');
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/index');
    }
}