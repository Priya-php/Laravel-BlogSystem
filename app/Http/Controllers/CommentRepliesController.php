<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CommentReply;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentRepliesController extends Controller
{
    public function index()
    {
        $replies = CommentReply::all();
        return view('admin.comments.replies.index', compact('replies'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function createReply(Request $request)
    {
       $user = Auth::user();
       $data = [
          'comment_id' => $request->comment_id,
          'author' => $user->name,
          'email' => $user->email,
          'photo' => $user->photo->file,
          'body' => $request->body
       ];
       //return $data;
       CommentReply::create($data);
       $request->session()->flash('comment_msg', 'Your message submitted, waiting moderation');
       return redirect()->back();
    }

    public function show($id)
    {
        $comment = Comment::findorfail($id);
        $replies = CommentReply::whereCommentId($comment->id)->get();
        return view('admin.comments.replies.show', compact('replies'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        CommentReply::findOrfail($id)->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        CommentReply::findOrfail($id)->delete();
        return redirect()->back();
    }
}
