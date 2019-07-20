@extends('master.admin_main')

@section('title'){{ $post->title }}@endsection

@section('main')

<div class="row">
	<div class="col-md-8">
		<div class="jumbotron">

			<!-- post title -->
			<h3>{{ $post->title }}</h3>

			<br />

			<!-- post head image -->
			<img src="{{ asset('images/head/' . $post->thumbnail) }}">

			<br />

			<!-- main post -->
			<post>
				{!! $post->body !!}
			</post>

			<br />
			<!-- comments -->
			<div>
				<h3>Comments <small>{{ $post->comments()->count() }} comments</small></h3>

				<table class="table">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th>Date</th>
						<th>Actions</th>
					</thead>
					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>{{ date('M j, Y h:i A', strtotime($comment->created_at)) }}</td>
							<td>
								{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
									{{ Form::submit('Delete', ['class'=>'btn btn-danger btn-sm',]) }}</i>
								{{ Form::close() }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div> 

		</div>
	</div>

	<div class="col-md-4">

		<div class="jumbotron">

			<dl class="dl">
				<dt>Create at</dt>
				<dd>{{ date('M j, Y h:i A', strtotime($post->created_at)) }}</dd>
			</dl>

			<dl class="dl">
				<dt>Last Updated at</dt>
				<dd>{{ date('M j, Y h:i A', strtotime($post->updated_at)) }}</dd>
			</dl>

			<dl class="dl">
				<dt>Category</dt>
				<dd>{{ $post->category->name }}</dd>
			</dl>

			<dl class="dl">
				<dt>Tags</dt>
				<dd>
					@foreach($post->tags as $tag)
						<sapn class="label label-default">{{ $tag->name }}</sapn>
					@endforeach
				</dd>
			</dl>

			@if(Auth::user()->level == 'Founder')
				<dl class="dl">
					<dt>Posted by</dt>
					<dd>{{ $post->posted_by }}</dd>
				</dl>

				<dl class="dl">
					<dt>Views</dt>
					<dd>{{ $post->views }}</dd>
				</dl>

				<dl class="dl">
					<dt>Views/Week</dt>
					<dd>{{ $post->vpw }}</dd>
				</dl>
			@endif

			<div class="row">
				<div class="col-md-6">
					<a href="{{ route('exploit.edit', $post->urltext) }}" class="btn btn-primary btn-block" style="margin-top: 5px;">Edit</a>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#destroy" style="margin-top: 5px;">Delete</button>		
				</div>
			</div>

		</div>

	</div>
</div>

<div class="modal fade" id="destroy" role="dialog">
	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
    		<div class="modal-body">
				<center>Are you sure you want to delete this article? This step can't be undo!</center>
			</div>
			<div class="modal-footer">
				<center>
				{!! Form::open(['route' => ['exploit.destroy', $post->id], 'method' => 'DELETE']) !!}
				<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
				{!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
				</center>
			</div>
		</div>
	</div>
</div>

@endsection