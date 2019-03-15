@extends('layouts.admin')

@section('content')
   <h1 class="page-header">Categories</h1>

   {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
      <div class="form-group">
         {!! Form::label('name', 'Name') !!}
         {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
         {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
      </div>
   {!! Form::close() !!}

   @include('includes.form_errors')

@stop