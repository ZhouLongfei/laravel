@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Enter password</h2>
	{!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('password','password',['class'=>'control-label']) !!}
            {!! Form::text('password',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group"> {{-- Don't forget to create a submit button --}}
  			{!! Form::submit('Submit', ['class' => 'form-control']) !!}
		</div>
    {!! Form::close() !!}

</div>
@endsection
