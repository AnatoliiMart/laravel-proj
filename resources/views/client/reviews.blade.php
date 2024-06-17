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
    <hr>
        @foreach ($reviews as $review)
        <div class="container flex justify-between">
            <div class="p-0">
                <h3>{{$review->name}}</h3>
                <p>{{$review->review}}</p>
                <p>{{$review->created_at}}</p>
            </div>
            <hr>
         </div>
        @endforeach 
</div>
@endsection