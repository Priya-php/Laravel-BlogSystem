
@extends('layouts.admin')

@section('styles')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@stop

@section('content')
   <h1 class="page-header">Upload New Media</h1>

   
   {!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone', 'files'=>true]) !!}
   {!! Form::close() !!}
      

@stop


@section('footer')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@stop
