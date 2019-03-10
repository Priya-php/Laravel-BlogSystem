@extends('layouts.admin')

@section('content')
   <h1 class="page-header">All Posts</h1>

   <table class="table">
      <thead>
         <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
         </tr>
      </thead>
      <tbody>
         @if ($posts)
            
            @foreach ($posts as $post)
               <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category_id}}</td>
                  <td><img src="{{$post->photo ? $post->photo->file : 'No photo'}}" alt="Post Photo" height="50"></td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->content}}</td>
                  <td>{{$post->created_at->diffForhumans()}}</td>
                  <td>{{$post->updated_at->diffForhumans()}}</td>
               </tr>
            @endforeach
            
         @endif
      </tbody>
   </table>
@stop

