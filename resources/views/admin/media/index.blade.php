@extends('layouts.admin')

@section('content')
   <h1 class="page-header">All Media</h1>

   <table class="table">
      <thead>
         <tr>
            <th>Id</th>
            <th>Path</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         
         @foreach ($photos as $photo)
            <tr>
               <td>{{$photo->id}}</td>
               <td><img src="{{$photo->file ? $photo->file : 'https://via.placeholder.com/70x50?text=No+Photo'}}" alt="Media" class="" height="50"></td>
               <td>{{$photo->created_at->diffForhumans()}}</td>
               <td>{{$photo->updated_at->diffForhumans()}}</td>
               <td>
                  <a href="{{route('admin.media.delete', $photo->id)}}" class="deleteRequest"><i class="fa fa-trash delete"></i></a>
               </td>
            </tr>
         @endforeach

      </tbody>
   </table>

@stop
