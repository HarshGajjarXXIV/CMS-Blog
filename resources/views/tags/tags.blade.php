@extends('master.admin_main')

@section('title', 'Tags' )

@section('main')
<div class="row">

	<div class="col-md-8">
		<div class="jumbotron">
			<h3>All Tags</h3>
		
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-4">

		<div class="jumbotron">
			{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
				<h3>Add New Tag</h3>
				<br />
				{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name', 'required' => '')) !!}
				<br />
				{!! Form::submit('Add',array('class' => 'btn btn-primary btn-block')) !!}
			{!! Form::close() !!}
		</div>

	</div>
</div>
@endsection