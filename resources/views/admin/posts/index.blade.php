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
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @if ($posts)
            
            @foreach ($posts as $post)
               <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                  <td><img src="{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/70x50?text=No+Image'}}" alt="Post Photo" height="50"></td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->created_at->diffForhumans()}}</td>
                  <td>{{$post->updated_at->diffForhumans()}}</td>
                  <td>
                     <a href="{{route('home.post', $post->slug)}}" target="blank"><i class="fa fa-share"></i></a>
                     <a href="{{route('admin.comments.show', $post->id)}}"><i class="fa fa-comment"></i></a>
                     <a href="{{route('admin.posts.edit', $post->id)}}"><i class="fa fa-pencil edit"></i></a>
                     <a href="{{route('admin.posts.delete', $post->id)}}"><i class="fa fa-trash delete"></i></a>
                  </td>
               </tr>
            @endforeach
            
         @endif
      </tbody>
   </table>
@stop

