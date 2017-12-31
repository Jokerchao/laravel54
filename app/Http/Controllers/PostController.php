<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
class PostController extends Controller
{
    //列表
    public function index()
    {
        $posts=Post::orderBy('created_at','desc')->Paginate(10);
        return view("post/index",compact('posts'));
        //return view("post/index");
    }
    //创建逻辑
    public function create()
    {
        return view("post/create");
    }
    public function store()
    {
        //验证前端的数据
        $this->validate(request(),[
            'title'=>'required|string|max:100|min:5',
            'content'=>'required|string|min:10'
            ]);

        //距
        $post=Post::create(request(['title','content']));


//        $post=new Post();
//        $post->title=request('title');
//        $post->content=request('content');
//        $post->save();

        return redirect('/posts');
    }
    //详情页面
    public function show(Post $post)
    {
//        $posts=[
//            ['title'=>"this is title1"]
//        ];
        return view("post/show",compact('post'));
    }
    //编辑逻辑
    public function edit(Post $post)
    {
        return view("post/edit",compact('post'));
    }
    public function update(Post $post)
    {
        //验证
        $this->validate(request(),[
            'title'=>'required|string|max:100|min:5',
            'content'=>'required|string|min:10'
        ]);
        //逻辑
        $post->title=request('title');
        $post->content=request('content');
        $post->save();

        //渲染
        return redirect("/posts/{$post->id}");
    }
    //删除逻辑
    public function delete(Post $post)
    {
        //TODO:用户权限验证

        $post->delete();
        return redirect("/posts");
    }
    public function imageUpload(Request $request)
    {
        $path=$request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'.$path);

    }



}
