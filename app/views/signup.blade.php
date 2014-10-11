@extends('layouts.main')

@section('content')

	<h1>Sign up <small>(<a href="{{ URL::route('login') }}">Go Login</a>)</small></h1>

	@foreach ($errors->all() as $error) 
		<p class="error">{{ $error }}</p>
	@endforeach

	{{ Form::open(array('autocomplete' => 'off' )) }}
		<input type="text" name="username" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
		<input type="submit" value="Sign up"/>
	{{ Form::close() }}

@stop