@extends('master.admin_main')

@section('title', 'Categories' )

@section('main')
<div class="row">

	<div class="col-md-8">
		<div class="jumbotron">
			<h3>All Categories</h3>
		
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-4">

		<div class="jumbotron">
			{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
				<h3>Add New Category</h3>
				<br />
				{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name', 'required' => '')) !!}
				<br />
				{!! Form::submit('Add',array('class' => 'btn btn-primary btn-block')) !!}
			{!! Form::close() !!}
		</div>

	</div>
</div>
@endsection