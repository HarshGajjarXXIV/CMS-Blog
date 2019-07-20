@extends('master.admin_main')

@section('title', 'Edit Category' )

@section('main')

	{{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) }}

		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		<br />
		<a href="{{ route('categories.show', $category->id) }}" class="btn btn-danger">Cancel</a>
		{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

	{{ Form::close() }}

@endsection