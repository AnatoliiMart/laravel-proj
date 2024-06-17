<div class="mt-3">
  {!! Form::label('name', "Genre Name:", ['class'=>'form-label']) !!}
  {!! Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="mt-3">
  {!! Form::label('description', "Genre Description:", ['class'=>'form-label']) !!}
  {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
</div>
<button class="btn btn-success mt-3">Add</button>