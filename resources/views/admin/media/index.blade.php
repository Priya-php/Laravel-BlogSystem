@extends('layouts.admin')

@section('content')
   <h1 class="page-header">All Media</h1>
   <form action="delete/media" method="POST" class="form-inline">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <div class="form-group">
         <select name="checkBoxArray" id="" class="form-control">
            <option value="">Delete</option>
         </select>
      </div>
      <div class="form-group">
         <input type="submit" value="Submit" class="btn btn-primary">
      </div>

      <table class="table">
         <thead>
            <tr>
               <th><input type="checkbox" id="options"></th>
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
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
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
   </form>
@stop

@section('footer')
   <script>
      $('document').ready(function(){
         $('#options').click(function(){
            if(this.checked){
               $('.checkBoxes').each(function(){
                  this.checked = true;
               })
            }else{
               $('.checkBoxes').each(function(){
                  this.checked = false;
               })
            }
         })
      })
   </script>
@stop
