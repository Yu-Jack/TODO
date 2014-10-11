@extends('layouts.main')

@section('content')

	<h1>Sign in <small>(<a href="{{ URL::route('signup') }}">Go Signup</a>)</small></h1>

	@foreach ($errors->all() as $error) 
		<p class="error">{{ $error }}</p>
	@endforeach

	{{ Form::open(array('autocomplete' => 'off' )) }}
		<input type="text" name="username" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
		<input type="submit" value="Sign in"/>
	{{ Form::close() }}
	
@stop