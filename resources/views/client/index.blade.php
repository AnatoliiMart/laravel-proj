@extends('templates.main')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-row flex-wrap gap-3">
        @foreach ($books as $book)
            <div class="card text-bg-dark" style="max-width: 340px;">
                <img src="{{$book->image}}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <div class=" row card-body  ">
                        <div class="row">
                            <h5 class="card-title">{{$book->name}}</h5>
                        </div>
                        <p class="card-text text-md-start">{{$book->genre->name}}</p>
                    </div>
                    <div class="row card-body">
                        <a href="{{route('book.show', ['book' => "$book->id"])}}" class="btn btn-outline-light">More Info</a>
                    </div>
                </div>
                
            </div>
        @endforeach
        
    </div>
    {{$books->links()}}
</div>
@endsection