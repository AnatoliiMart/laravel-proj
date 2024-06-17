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
    <div class="d-flex justify-content-center ">
        <h2 class="m-3">Create Book</h1>
        <div class="container mt-3 w-50">
            {!! Form::open(['route'=>'books.store', 'files' => true]) !!}
            @include('admin.books._form')
            {!! Form::close()!!}
        </div>
    </div>
@endsection