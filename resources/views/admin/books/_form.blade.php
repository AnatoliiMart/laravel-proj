<div class="mt-3">
  {!! Form::label('name', "Book Name:", ['class'=>'form-label']) !!}
  {!! Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="mt-3">
  {!! Form::label('description', "Book Description:", ['class'=>'form-label']) !!}
  {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
</div>
<div class="mt-3">
  {!! Form::label('genre_id', "Choose book genre:", ['class'=>'form-label']) !!}
  {!! Form::select('genre_id', $genres, ['class'=>'form-control'])!!}
</div>
<div class="mt-3">
  {!! Form::label('image', "Upload book image:", ['class'=>'form-label']) !!}
  {!! Form::file('image',['class'=>'form-control'])!!}
</div>
<button class="btn btn-success mt-3">Add</button>