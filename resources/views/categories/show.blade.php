@extends('master.admin_main')

@section('title'){{ $category->name.' Category' }}@endsection

@section('main')
<div class="row">

	<div class="col-md-10">
		<h3>{{ $category->name }} Category <small>{{ $category->posts()->count() }} posts</small></h3>
	</div>
	<div class="col-md-2">
		<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-block" style="margin-top: 20px">Edit Category</a>
	</div>

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
			@foreach ($category->posts as $post)
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