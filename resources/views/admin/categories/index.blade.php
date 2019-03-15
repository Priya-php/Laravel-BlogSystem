@extends('layouts.admin')

@section('content')
   <h1 class="page-header">Categories</h1>

   <div class="row">
      <div class="col-md-6">
         <h3 class="page-header">Create Category</h3>

         {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
               {!! Form::label('name', 'Name') !!}
               {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::submit('Creat Category', ['class' => 'btn btn-primary']) !!}
            </div>
         {!! Form::close() !!}

         @include('includes.form_errors')

      </div>
      <div class="col-md-6">
         <h3 class="page-header">All Categories</h3>

         <table class="table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Created</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               
               @foreach ($categories as $category)
                
               <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->created_at}}</td>
                  <td>
                     <a href="{{route('admin.categories.edit',$category->id)}}"><i class="fa fa-pencil edit"></i></a>
                     <a href="{{route('admin.categories.delete',$category->id)}}" class="deleteRequest"><i class="fa fa-trash delete"></i></a>
                  </td>
               </tr>

               @endforeach
               
            </tbody>
         </table>
      </div>
   </div>
@stop

