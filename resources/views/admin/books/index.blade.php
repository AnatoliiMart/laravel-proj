@extends('templates.main')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($books->count() === 0)
<h2>There are no books</h2>
<a class="btn btn-primary" href="{{route('books.create')}}">Create New Book</a>
@else  
<h2>All Books</h2>
<a class="btn btn-primary" href="{{route('books.create')}}">Create New Book</a>
<table class="table table-striped table-hover">
  <thead>
    <tr class="text-center">
      <th>#</th>
      <th>Name</th>
      <th>Image</th>
      <th>Description</th>
      <th>Genre</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($books as $book)
            <tr class="text-center mt-2">
              <td>{{$loop->iteration}}</td>
              <td><img src="{{asset($book->image)}}" alt="{{$book->name}}" width="100px"></td>
              <td>{{$book->name}}</td>
              <td>{{$book->short_description}}</td>
              <td>{{$book->genre->name}}</td>
              <td>
                <div class="d-flex flex-row gap-3 align-items-center justify-content-center">
                  <a class="btn btn-warning" href="{{route('books.edit', ['book'=> $book->id])}}">Edit</a>
                  {!! Form::open(['route'=>['books.destroy', $book->id], 'method' => 'delete']) !!}
                  <button type="submit" class="btn btn-danger">Delete</button>
                  {!! Form::close() !!}
                </div>
              </td>
            </tr>
  @endforeach
  
</tbody>
</table>
{{$books->links()}}
@endif

@endsection