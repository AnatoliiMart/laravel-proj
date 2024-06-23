@extends('templates.main')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="d-flex flex-col justify-content-center">
      <h2 class="m-3">Edit Book</h1>
      <div class="container mt-3 w-50">
        <img src="{{$book->image}}" alt="" style="max-width: 340px">
        {!! Form::model($book, ['route'=>['books.update', $book->id,], 'method'=>'put', 'files' => true ]) !!}
        @include('admin.books._form')
        {!! Form::close()!!}
      </div>
    </div>
@endsection