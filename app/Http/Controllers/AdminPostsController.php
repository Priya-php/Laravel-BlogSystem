<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Photo;

class AdminPostsController extends Controller
{
   public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
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
        //
    }

    public function edit($id)
    {
        return view('admin.posts.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
