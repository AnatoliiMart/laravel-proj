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
        <h3 class="m-3">Reviews({{$reviews->count()}})</h3>
        @foreach ($reviews as $review)
        <div class="p-2 border border-primary rounded-2 m-3" style="width:80%">
            <div>
              <h3>{{ $review->name }}</h3>
              <p>{{ $review->review }}</p>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between">
                <p class="fs-6 fst-italic">{{date_format($review->created_at, 'd-m-Y')}}</p>
                {!! Form::open(['route'=>['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </div>
          </div>         
        @endforeach
      </div>
    </div>
@endsection