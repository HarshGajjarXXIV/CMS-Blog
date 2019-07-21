@extends('master.admin_main')

@section('title', 'Statistics' )

@section('main')
	
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron" style="text-align: center;">
				<h3>Blog Statistics</h3>
				<br />
				<p>Number of Total Posts <b>{{ $posts->count() }}</b></p>
				<p>Number of Categories <b>{{ $categories->count() }}</b></p>
				<p>Number of Tags <b>{{ $tags->count() }}</b></p>
				<p>Number of Comments <b>{{ $comments->count() }}</b></p>
				<p>Number of Messgaes <b>{{ $messages->count() }}</b></p>
			</div>
		</div>
	</div>

@endsection