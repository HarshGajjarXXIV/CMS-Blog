@extends('master.admin_main')

@section('title', 'Edit Tag' )

@section('main')

	{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		<br />
		<a href="{{ route('tags.show', $tag->id) }}" class="btn btn-danger">Cancel</a>
		{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

	{{ Form::close() }}

@endsection