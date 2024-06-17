@extends('templates.main')
@section('content')
    <h2>Editing genre <span style="color: rgb(9, 173, 12);">{{$genre->name}}</span></h2>
    {!! Form::model($genre, ['route'=>['genres.update', $genre->id], 'method'=>'put']) !!}
      @include('admin.genres._form')
    {!! Form::close()!!}
@endsection