<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    public function index()
    {
      $comments = Comment::paginate(4);
      return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       $user = Auth::user();
       $data = [
          'post_id' => $request->post_id,
          'author' => $user->name,
          'email' => $user->email,
          'photo' => $user->photo->file,
          'body' => $request->body
       ];
       //return $data;
       Comment::create($data);
       $request->session()->flash('comment_msg', 'Your message submitted, waiting moderation');
       return redirect()->back();
    }

    public function show($id)
    {
        $comments = Comment::wherePostId($id)->get();
        return view('admin.comments.show', compact('comments'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());
        return redirect('admin/comments');
    }

    public function destroy($id)
    {
      Comment::findOrFail($id)->delete();
      return redirect('admin/comments');
    }
}
