@extends('layouts.admin')

@include('includes.tinyeditor')

@section('content')
   <h1 class="page-header">Create Post</h1>

   {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
      <div class="form-group">
         {!! Form::label('title', 'Title') !!}
         {!! Form::text('title', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
         {!! Form::label('category_id', 'Category') !!}
         {!! Form::select('category_id', [''=>'-- Choose Option --'] + $categories, null, ['class' => 'form-control']) !!}
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
         {!! Form::submit('Creat Post', ['class' => 'btn btn-primary']) !!}
      </div>
   {!! Form::close() !!}
   
      
      @include('includes.form_errors')
      
@stop

