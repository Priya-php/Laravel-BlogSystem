
@extends('layouts.admin')


@section('content')
   <h3 class="page-header">Comments</h3>

   <table class="table">
      <thead>
         <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Posted On</th>
            <th>Post</th>
            <th>Replies</th>
            {{--  <th>Status</th>  --}}
            <th colspan="2">Action</th>
         </tr>
      </thead>

      <tbody>
            @if (count($comments) > 0)
            
               @foreach ($comments as $comment)
                  <tr>
                     <td>{{$comment->id}}</td>
                     <td>{{$comment->author}}</td>
                     <td>{{$comment->email}}</td>
                     <td>{{str_limit($comment->body, 15)}}</td>
                     <td>{{$comment->created_at->diffForhumans()}}</td>
                     <td><a href="{{route('home.post',$comment->post_id)}}" target="blank">View Post</a></td>
                     <td><a href="{{route('admin.comment.replies.show',$comment->id)}}" target="blank">View Replies</a></td>
                     {{--  <td>{{$comment->is_active ? 'Active' : 'Not Active'}}</td>  --}}
                     <td>
                        
                        @if ($comment->is_active)
                           
                           {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                              {!! Form::hidden('is_active', 0) !!}
                              {!! Form::submit('Unapprove', ['class' => 'btn btn-info btn-sm']) !!}
                           {!! Form::close() !!}
                           
                        @else
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                           {!! Form::hidden('is_active', 1) !!}
                           {!! Form::submit('Approve', ['class' => 'btn btn-info btn-sm']) !!}
                        {!! Form::close() !!}
                        @endif
                        
                     </td>
                     <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm deleteRequest']) !!}
                        {!! Form::close() !!}
                     </td>
                  </tr>
               @endforeach
            @else
               <tr>
                  <td colspan="8" class="text-center"><h4>No comments yet</h4></td>
               </tr>
            @endif

      </tbody>
   </table>

   <div class="row">
      <div class="col-md-12 text-right">
         {{$comments->render()}}
      </div>
   </div>
@stop