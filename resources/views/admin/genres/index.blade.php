@extends('templates.main')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($genres->count() === 0)
<h2>There are no genres</h2>
<a class="btn btn-primary" href="{{route('genres.create')}}">Create New Genre</a>
@else  
<h2>All Genres</h2>
<a class="btn btn-primary" href="{{route('genres.create')}}">Create New Genre</a>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($genres as $genre)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$genre->name}} {{$genre->books_count}}</td>
      <td>{{$genre->description}}</td>
      <td>
        <a class="btn btn-warning" href="{{route('genres.edit', ['genre'=> $genre->id])}}">Edit</a>
        {!! Form::open(['route'=>['genres.destroy', $genre->id], 'method' => 'delete']) !!}
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
</tbody>
</table>
@endif

@endsection