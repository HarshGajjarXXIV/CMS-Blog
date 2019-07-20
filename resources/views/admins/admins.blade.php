@extends('master.admin_main')

@section('title', 'Admins' )

@section('main')
<div class="row">

	<div class="col-md-10">
		<h3>All Admins <small>{{ $hackers->count() }} admins</small></h3>
	</div>
	<div class="col-md-2">
		<a href="{{ route('admins.create') }}" class="btn btn-primary btn-block" style="margin-top: 20px">Add Admin</a>
	</div>

</div>
<br />
<div class="row">

	<div class="col-md-12">

		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($hackers as $hacker)
				<tr>
					<td>{{ $hacker->name }}</td>
					<td>{{ $hacker->user }}</td>
					<td>{{ $hacker->email }}</td>
					<td>{{ $hacker->level }}</td>
					<td>
						<a href="{{ route('admins.show', $hacker->id) }}" class="btn btn-primary btn-sm" style="margin-top: 1px;"><i class='fa fa-file'></i></a>
						<a href="{{ route('admins.edit', $hacker->id ) }}" class="btn btn-success btn-sm" style="margin-top: 1px;"><i class='fa fa-pencil'></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
	
</div>
@endsection