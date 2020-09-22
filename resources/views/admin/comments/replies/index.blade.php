
@extends('layouts.admin')


@section('content')
   <h3 class="page-header">All Replies</h3>

   <table class="table">
      <thead>
         <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Reply</th>
            <th>Posted On</th>
            <th>Post</th>
            {{--  <th>Status</th>  --}}
            <th colspan="2">Action</th>
         </tr>
      </thead>

      <tbody>
            @if (count($replies) > 0)
            
               @foreach ($replies as $reply)
                  <tr>
                     <td>{{$reply->id}}</td>
                     <td>{{$reply->author}}</td>
                     <td>{{$reply->email}}</td>
                     <td>{{str_limit($reply->body, 15)}}</td>
                     <td>{{$reply->created_at->diffForhumans()}}</td>
                     <td><a href="{{route('home.post',$reply->comment->post_id)}}" target="blank">View Post</a></td>
                     {{--  <td>{{$reply->is_active ? 'Active' : 'Not Active'}}</td>  --}}
                     <td>
                        
                        @if ($reply->is_active)
                           
                           {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                              {!! Form::hidden('is_active', 0) !!}
                              {!! Form::submit('Unapprove', ['class' => 'btn btn-info btn-sm']) !!}
                           {!! Form::close() !!}
                           
                        @else
                        {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                           {!! Form::hidden('is_active', 1) !!}
                           {!! Form::submit('Approve', ['class' => 'btn btn-info btn-sm']) !!}
                        {!! Form::close() !!}
                        @endif
                        
                     </td>
                     <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
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

   
@stop