@extends('layouts.main')

@section('content')
	<h1>Your Item <small>(<a href="{{ URL::route('new') }}">New Task</a>)</small></h1>

	<ul>
		@foreach ($items as $item)
			<li>
				{{ Form::open() }}
					<input type="checkbox" onCLick="this.form.submit()" value="{{ $item->id }}" {{ $item->done ? 'checked' : '' }}>
					{{ e($item->name) }}

					<input type="hidden" name="id" value="{{ $item->id }}" > <small>(<a href="{{ URL::route('delete', $item->id ) }}">x</a>)</small>
				{{ Form::close() }}
			</li>
		@endforeach
	</ul>
@stop