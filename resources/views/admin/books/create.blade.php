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
    <h2>Create Book</h1>
    {!! Form::open(['route'=>'books.store', 'files' => true]) !!}
    @include('admin.books._form')
    {!! Form::close()!!}
@endsection