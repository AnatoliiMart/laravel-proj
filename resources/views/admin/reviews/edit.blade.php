@extends('templates.main')
@section('content')
<div class="border border-success border-2 rounded-3 mt-3 p-2" style="width: 80%">
    <h2>Editing review</h2>
    {!! Form::model($review, ['route'=>['reviews.update', $review->id], 'method'=>'put']) !!}
      @include('admin.reviews._form')
    {!! Form::close()!!}
</div>
@endsection