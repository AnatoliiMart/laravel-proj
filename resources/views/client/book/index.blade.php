@extends('templates.main')
@section('content')
  <div class="container">
    <div class="d-flex ">
    
      <img src="{{$book->image}}" alt="">
      <div class="container">
          <h2>{{$book->name}}</h2>
          <label>Description:</label>
          <p class="fs-4 ">{{$book->description}}</p>
          <p>Genre:{{' '.$book->genre->name}}</p>
      </div>
    </div>
    @if (Auth::user())
        <div class="border border-success border-2 rounded-3 mt-3" style="width: 80%">
        <h3 class="p-3">Make review on this book</h3>
        <form action="{{route('reviews.store')}}" method="post" class="p-3 pt-0" >
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <input type="hidden" class="form-control"name="name"  value="{{Auth::user()->name}}" readonly>

            <div class="form-group">

                <textarea class="form-control" name="review" placeholder="Put your review here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Make Review</button>
        </form>
      </div>
      @if (session('success'))
        <div class="alert alert-success mt-3" style="width: 80%">
            {{ session('success') }}
        </div>
      @endif
    @else
      <h3 class="mt-2">
        <a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{route('login')}}">Login</a> or 
        <a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{route('register')}}">Regist</a> to make reviews</h3>
    @endif
    <h3 class="mt-2">Rewiews<small>({{$book->reviews->count()}})</small>:</h3>
    <div class="d-flex flex-col flex-wrap-reverse justify-content-start gap-2 mt-2">
      @foreach ($book->reviews as $review)
          <div class="p-2 border border-primary rounded-2" style="width:80%">
            <div>
              <h3>{{ $review->name }}</h3>
              <p>{{ $review->review }}</p>
            </div>
            <div class="d-flex flex-row gap-2 align-items-center">
              <p class="fs-6 fst-italic pt-3">{{date_format($review->created_at, 'd-m-Y')}}</p>
              @auth
                @if (Auth::user()->isAdmin())
                  <a class="btn btn-warning" href="{{route('reviews.edit', ['review'=> $review->id])}}">Edit</a>
                  {!! Form::open(['route'=>['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                  <button type="submit" class="btn btn-danger">Delete</button>
                  {!! Form::close() !!}
                @endif
              @endauth
            </div>
          </div>
      @endforeach
    </div>
  </div>
@endsection