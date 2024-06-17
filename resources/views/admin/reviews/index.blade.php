@extends('templates.main')
@section('content')
<div class="container">
    <div class="border border-success border-2 rounded-3">
        <form action="{{route('reviews.store')}}" method="post" class="p-3 pt-0" >
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control"name="name">
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <textarea class="form-control" name="review"></textarea>
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
        <div class="d-flex flex-row justify-content-between">
           <di class="d-flex flex-column justify-content-between">
               <h3>{{$review->name}}</h3>
               <p>{{$review->review}}</p>
               <p>{{$review->created_at}}</p>
           </di>
           
        </div>
        <hr>
    @endforeach
</div>
@endsection
