@extends('layouts.admin')

@section('content')
   <h1 class="page-header">Update User</h1>
   <div class="row">
      <div class="col-md-3">
         <img src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="Profile Image" class="img-responsive">
      </div>
      <div class="col-md-9">
         {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
               {!! Form::select('role_id', $roles, null, [ 'class' => 'form-control']) !!}
            </div>
                                                      
            <div class="form-group">
               {!! Form::label('status', 'Status') !!}
               {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], null, [ 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
               {!! Form::label('photo', 'Photo') !!}
               {!! Form::file('photo', [ 'class' => 'form-control']) !!}
            </div>

            {{--  <div class="form-group">
               {!! Form::label('password', 'Password') !!}
               {!! Form::password('password', [ 'class' => 'form-control']) !!}
            </div>  --}}

            <div class="form-group">
               {!! Form::submit('Creat User', ['class' => 'btn btn-primary']) !!}
            </div>
         
         {!! Form::close() !!}

      </div>
   </div>

   <div class="row">
      <div class="col-md-6">
         {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
            <div class="form-group">
               {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
            </div>
         {!! Form::close() !!}
      </div>
   </div>

   @include('includes.form_errors')
   
   
@stop
