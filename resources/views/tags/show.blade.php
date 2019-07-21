@extends('master.admin_main')

@section('title'){{ $tag->name.' Tag' }}@endsection

@section('main')
<div class="row">

	<div class="col-md-8">
		<h3>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} posts</small></h3>
	</div>
	<div class="col-md-2">
		<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block" style="margin-top: 20px">Edit Tag</a>
	</div>
	<div class="col-md-2">
		<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#destroy" style="margin-top: 20px;">Delete</button>
	</div>

	<!-- delete popup -->
	<div class="modal fade" id="destroy" role="dialog">
		<div class="modal-dialog modal-sm">
	    	<div class="modal-content">
	    		<div class="modal-body">
					<center>Are you sure you want to delete this tag? This step can't be undo!</center>
				</div>
				<div class="modal-footer">
					<center>
					{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
					<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
					{!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
					</center>
				</div>
			</div>
		</div>
	</div>
	<!-- end delete popup -->

</div>
<br />

<div class="row">
<div class="col-md-12">
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Category</th>
				<th>Tags</th>
				<th>Created at</th>
				<th>Posted by</th>
				<th>Views</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tag->posts as $post)
			<tr>
				<td>{{ $post->title }}</td>
				<td>{{ $post->category->name }}</td>
				<td>
					@foreach ($post->tags as $tag)
						<span class="label label-default">{{ $tag->name }}</span>
					@endforeach
				</td>
				<td>{{ date('M j, Y h:i A', strtotime($post->created_at)) }}</td>
				<td>{{ $post->posted_by }}</td>
				<td>{{ $post->views }}</td>
				<td>
					<a href="{{ route('admin.show', $post->urltext) }}" class="btn btn-primary btn-sm" style="margin-top: 1px;"><i class='fa fa-file'></i></a>
					<a href="{{ route('admin.edit', $post->urltext) }}" class="btn btn-success btn-sm" style="margin-top: 1px;"><i class='fa fa-pencil'></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		</div>
	</div>

@endsection