<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Category;
use App\Http\Requests\PostsEditRequest;
use App\Comment;

class AdminPostsController extends Controller
{
   public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostCreateRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();

        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);
        return redirect('/admin/posts');
    }

    public function show($id)
    {
        return "Show Post";
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    public function update(PostsEditRequest $request, $id)
    {
        $user = Auth::user();
        $input = $request->all();

        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        // $user->posts()->whereId($id)->first()->update($input);
        Post::whereId($id)->first()->update($input);
        return redirect('/admin/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if($post->photo_id){
            unlink(public_path().$post->photo->file);
        }
        
        $post->delete();

        return redirect('/admin/posts');
    }

    public function post($slug){
        $post = Post::findBySlugOrFail($slug);
        $comments = Comment::wherePostId($post->id)->whereIsActive(1)->get();
        return view('post', compact('post', 'comments'));
    }
}
