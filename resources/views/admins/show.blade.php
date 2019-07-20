@extends('master.admin_main')

@section('title'){{ $hacker->name }}@endsection

@section('main')

<div class="row">
	<div class="col-md-8">
		<div class="jumbotron">

			<div class="row">

				<div class="col-md-4">
					<img src="{{ asset('images/author/'. $hacker->profile_pic) }}" class="img-circle" style="display: block;">
				</div>

				<div class="col-md-8">
					<h3>{{ $hacker->name }}</h3>
				</div>

			</div>

			<br />
			<b>User Name</b>
			<div class="body" ">
				{{ $hacker->user }}
			</div>

			<br />
			<b>Email</b>
			<div class="body" ">
				{{ $hacker->email }}
			</div>

		
			<br />
			<b>Twitter</b>
			<div class="body" ">
				{{ $hacker->twitter }}
			</div>

			<br />
			<b>Facebook</b>
			<div class="body" ">
				{{ $hacker->fb }}
			</div>

			<br />
			<b>Instagram</b>
			<div class="body" ">
				{{ $hacker->insta }}
			</div>

			<br />
			<b>About</b>
			<div class="body">
				<p>{{ $hacker->about }}</p>
			</div>

		</div>
	</div>

	<div class="col-md-4">

		<div class="jumbotron">

			<dl class="dl">
				<dt>Join date</dt>
				<dd>{{ date('M j, Y h:i A', strtotime($hacker->created_at)) }}</dd>
			</dl>

			<dl class="dl">
				<dt>Profile Updated at</dt>
				<dd>{{ date('M j, Y h:i A', strtotime($hacker->updated_at)) }}</dd>
			</dl>


			<dl class="dl">
				<dt>Role</dt>
				<dd>{{ $hacker->level }}</dd>
			</dl>

			<dl class="dl">
				<dt>Articles</dt>
				<dd>{{ $posts->count() }}</dd>
			</dl>

			<div class="row">
				<div class="col-md-6">
					<a href="{{ route('admins.edit', $hacker->id) }}" class="btn btn-primary btn-block" style="margin-top: 5px;">Edit</a>
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
				<center>Are you sure you want to remove this admin? This step can't be undo!</center>
			</div>
			<div class="modal-footer">
				<center>
					{!! Form::open(['route' => ['admins.destroy', $hacker->id], 'method' => 'DELETE']) !!}
					<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
					{!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</center>
			</div>
		</div>
	</div>
</div>


@endsection