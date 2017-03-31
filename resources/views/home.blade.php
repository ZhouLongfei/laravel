@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br>
                    <h5>public romms</h5>
                    <ul>
                    	@foreach ($publicrooms as $publicroom)
                    		<li>

                    			<form action="/chat" method="post">
  									<input type="submit" name ="channelName" value="<?php  							
  										echo $publicroom;
  										?>">
                      <input type="hidden" name="pub" value=1>
  									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form> 

                    		</li>
                    	@endforeach
                    </ul>
                    <h5>romms</h5>
                    <ul>
                    	@foreach ($rooms as $room)
                    		<li>
                    			<form action="/chat" method="post">
  									<input type="submit" name ="submit" value="<?php  										
  										echo $room;
  										?>">
  									<input type="hidden" name="channelName" value="<?php 
  										
  										echo $room;
  										?>">
                      <input type="hidden" name="pub" value=0>
  									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form> 

                    		</li>
                    	@endforeach
                    </ul>
                    <h5>YourRomms</h5>
                    <ul>
                      @foreach ($yourrooms as $yourroom)
                        <li>
                          <form action="/chat" method="post">
                    <input type="submit" name ="submit" value="<?php                      
                      echo $yourroom;
                      ?>">
                    <input type="hidden" name="channelName" value="<?php 
                      
                      echo $yourroom;
                      ?>">
                      <input type="hidden" name="pub" value=0>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form> 

                        </li>
                      @endforeach
                    </ul>
                    <h5>Create new room</h5>
                    {!! Form::open() !!}
                    	<div class="form-group">
                    		{!! Form::label('name','room name',['class'=>'control-label']) !!}
                    		{!! Form::text('name',null,['class'=>'form-control']) !!}
                    	</div>
                      <div class="form-group">
                        {!! Form::label('password','password',['class'=>'control-label']) !!}
                        {!! Form::text('password',null,['class'=>'form-control']) !!}
                      </div>
                    	<div class="form-group">
  							{!! Form::label('type', 'type', ['class' => 'control-label']) !!}
  							{!! Form::radio('type', 'public', false, ['class' => 'form-control']) !!}A.public
  							
  							{!! Form::radio('type', 'private', false, ['class' => 'form-control']) !!}B.private
						</div>
						<div class="form-group"> {{-- Don't forget to create a submit button --}}
  							{!! Form::submit('Submit', ['class' => 'form-control']) !!}
						</div>
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
