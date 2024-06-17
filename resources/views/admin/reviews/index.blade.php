@extends('templates.main')
@section('content')
<div class="container">
    <div class="border border-success border-2 rounded-3">
        <form action="{{route('reviews.store')}}" method="post" class="p-3 pt-0" >
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control"name="name" value="{{Auth::user()->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <textarea class="form-control" name="review"></textarea>
            </div>
            <div class="form-group mt-3">
                {!! Form::label('book_id', "For book:", ['class'=>'form-label']) !!}
                {!! Form::select('book_id', $books, ['class'=>'form-control'])!!}
            </div>
            <button type="submit" class="btn btn-primary mt-3">Make Review</button>
        </form>
       
    </div>
    
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    <hr>
    @foreach ($reviews as $review)
           <div class="d-flex flex-row justify-content-between border border-2 border-primary rounded-2 p-2 mb-2">
               <div class="w-75">
                   <h3>{{$review->name}}</h3>
                   <p>{{$review->review}}</p>
               </div>
               <div class="w-25 ml-5 ">
                   <p>Book:{{' '.$review->book->name}}</p>
                   <p>{{$review->created_at}}</p>
                   {!! Form::open(['route'=>['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                   <button type="submit" class="btn btn-danger">Delete</button>
                   {!! Form::close() !!}
               </div>    
           </div>
    @endforeach
</div>
@endsection
