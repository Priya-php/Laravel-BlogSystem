@extends('layouts.admin')
@include('includes.tinyeditor')
@section('content')
   <h1 class="page-header">Edit Post</h1>

   <div class="row">
      <div class="col-md-3">
         
         @if ($post->photo_id)
            <img src="{{$post->photo->file}}" alt="{{$post->title}}" class="img-responsive">
         @else 
            <img src="https://via.placeholder.com/300x300?text=No+Image" alt="{{$post->title}}" class="img-responsive">
         @endif
         
      </div>
      <div class="col-md-9">

         {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
            <div class="form-group">
               {!! Form::label('title', 'Title') !!}
               {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::label('category_id', 'Category') !!}
               {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::label('photo', 'Photo') !!}
               {!! Form::file('photo', ['class' => '']) !!}
            </div>
            <div class="form-group">
               {!! Form::label('content', 'Description') !!}
               {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
            </div>
         {!! Form::close() !!}
         
         @include('includes.form_errors')

      </div>
   </div>

@stop

