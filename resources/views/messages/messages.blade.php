@extends('master.admin_main')

@section('title', 'Messages' )

@section('main')

<div class="row">

	<h3>All Messages <small>{{ $messages->count() }} messages</small></h3>
	
</div>
<br />
<div class="row">

	<div class="col-md-12">

	<table class="table">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Date</th>
			<th>Actions</th>
		</thead>

		<tbody>
			
			@foreach ($messages as $message)

				<tr>
					<td>{{ $message->name }}</td>
					<td>{{ $message->email }}</td>
					<td>{{ $message->message }}</td>
					<td>{{ date('M j, Y h:i A', strtotime($message->created_at)) }}</td>
					<td>
						{{ Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'DELETE']) }}
							{{ Form::submit('Delete', ['class'=>'btn btn-danger btn-sm',]) }}</i>
						{{ Form::close() }}
					</td>
				</tr>

			@endforeach

		</tbody>
	</table>

	<div class="text-center">
		{!! $messages->links(); !!}
	</div>

	</div>

</div>

@endsection