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
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>Contact Us</h1>
    <form action="{{route('contacts.send')}}" method="post">
        @csrf
        <div class="mt-3">
            <label for="" class="form-label">Name:</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   name="name" value="{{old('name')}}">
                   @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
 
        <div class="mt-3">
            <label for="" class="form-label">Email:</label>
            <input type="text" 
                   class="form-control @error('email') is-invalid @enderror" 
                   name="email" 
                   value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
 
        <div class="mt-3">
            <label for="" class="form-label">Message:</label>
            <textarea class="form-control" name="message"></textarea>
        </div>
 
        <button class="btn btn-primary mt-3">Send</button>
    </form>
@endsection
