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
    <tr class="text-center">
      <th>#</th>
      <th>Name</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($genres as $genre)
    <tr class="text-center">
      <td>{{$loop->iteration}}</td>
      <td>{{$genre->name}} {{$genre->books_count}}</td>
      <td style="width:40%">{{$genre->description}}</td>
      <td style="width:30%">
        <div class="d-flex flex-row gap-3 align-items-center justify-content-center mt-3">
          <a class="btn btn-warning" href="{{route('genres.edit', ['genre'=> $genre->id])}}">Edit</a>
          {!! Form::open(['route'=>['genres.destroy', $genre->id], 'method' => 'delete']) !!}
          <button type="submit" class="btn btn-danger">Delete</button>
          {!! Form::close() !!}
        </div>
      </td>
    </tr>
  @endforeach
</tbody>
</table>
@endif

@endsection