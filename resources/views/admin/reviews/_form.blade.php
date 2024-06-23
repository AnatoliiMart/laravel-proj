
<div class="mt-3">
  <input type="hidden" name="book_id" value="{{$review->book_id}}"/>
  {!! Form::label('name', "User:", ['class'=>'form-label']) !!}
  {!! Form::text('name', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>
<div class="mt-3">
  {!! Form::label('review', "Review:", ['class'=>'form-label']) !!}
  {!! Form::textarea('review', null, ['class'=>'form-control'])!!}
</div>
<button class="btn btn-success mt-3">Edit</button>