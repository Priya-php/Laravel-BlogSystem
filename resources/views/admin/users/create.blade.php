@extends('layouts.admin')

@section('content')
   <h1 class="page-header">Create User</h1>

   {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
      <div class="form-group">
         {!! Form::label('name', 'Name') !!}
         {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
      </div>

      {{ csrf_field() }}

      <div class="form-group">
         {!! Form::label('email', 'Email') !!}
         {!! Form::text('email', null, [ 'class' => 'form-control']) !!}
      </div>

      <div class="form-group">
         {!! Form::label('role_id', 'Role') !!}
         {!! Form::select('role_id', [''=>'Choose user role'] +  $roles, null, [ 'class' => 'form-control']) !!}
      </div>
                                                  
      <div class="form-group">
         {!! Form::label('status', 'Status') !!}
         {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], 0, [ 'class' => 'form-control']) !!}
      </div>

      <div class="form-group">
         {!! Form::label('photo', 'Photo') !!}
         {!! Form::file('photo', [ 'class' => 'form-control']) !!}
      </div>

      <div class="form-group">
         {!! Form::label('password', 'Password') !!}
         {!! Form::password('password', [ 'class' => 'form-control']) !!}
      </div>

      <div class="form-group">
         {!! Form::submit('Creat User', ['class' => 'btn btn-primary']) !!}
      </div>
   
   {!! Form::close() !!}

   @include('includes.form_errors')
   
   
@stop
