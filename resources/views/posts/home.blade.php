@extends('master.admin_main')

@section('title', 'Home' )

@section('main')

<div class="row">

	<div class="col-md-10">
		@if(Auth::user()->level == 'Founder')
			<h3>All Posts <small>{{ $posts->count() }} posts</small></h3>
		@else
			<h3>Posts by You <small>{{ $posts->count() }} posts</small></h3>
		@endif
	</div>
	<div class="col-md-2">
		<a href="{{ route('admin.create') }}" class="btn btn-primary btn-block" style="margin-top: 20px">Create Post</a>
	</div>

</div>
<br />
<div class="row">

	<div class="col-md-12">

		<table class="table">
			<thead>
				<th>Title</th>
				<th>Category</th>
				<th>Tags</th>
				<th>Created at</th>
				@if(Auth::user()->level == 'Founder')
					<th>Posted by</th>
					<th>Views</th>
					<th>Views/ Week</th>
				@endif
				<th>Actions</th>
			</thead>

			<tbody>
				
				@foreach ($posts as $post)

					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->category->name }}</td>
						<td>
						@foreach ($post->tags as $tag)
							<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
						</td>
						<td>{{ date('M j, Y h:i A', strtotime($post->created_at)) }}</td>
						@if(Auth::user()->level == 'Founder')
							<td>{{ $post->posted_by }}</td>
							<td>{{ $post->views }}</td>
							<td>{{ $post->vpw }}</td>
						@endif
						<td>
							<a href="{{ route('admin.show', $post->urltext) }}" class="btn btn-primary btn-sm" style="margin-top: 1px;"><i class='fa fa-file'></i></a>
							<a href="{{ route('admin.edit', $post->urltext) }}" class="btn btn-success btn-sm" style="margin-top: 1px;"><i class='fa fa-pencil'></i></a>
						</td>
					</tr>

				@endforeach

			</tbody>
		</table>

		<div class="text-center">
		{!! $posts->links(); !!}
		</div>

	</div>

</div>

@endsection