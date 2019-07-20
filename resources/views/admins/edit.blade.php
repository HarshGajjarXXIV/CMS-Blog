@extends('master.admin_main')

@section('title','Edit Admin Profile')

@section('main')

<div class="row">
	{!! Form::model($hacker, ['route' => ['admins.update', $hacker->id], 'method' => 'PUT', 'files' => true]) !!}
	<div class="col-md-8">
		<div class="jumbotron">

			{!! Form::label('name','Full Name', ['class'=>'submit-form']) !!}
			{!! Form::text('name', null, array('class' => 'form-control input-lg', 'required' => '')) !!}

			{!! Form::label('profile_pic','Update Profile Picture', ['class'=>'submit-form']) !!}
			{!! Form::file('profile_pic') !!}

			{!! Form::label('user','Username', ['class'=>'submit-form']) !!}
			{!! Form::text('user', null, array('class' => 'form-control input-lg', 'required' => '')) !!}

			{!! Form::label('email','Email', ['class'=>'submit-form']) !!}
			{!! Form::email('email', null, array('class' => 'form-control input-lg', 'required' => '')) !!}

			{!! Form::label('twitter','Twitter', ['class'=>'submit-form']) !!}
			{!! Form::text('twitter', null, array('class' => 'form-control input-lg')) !!}

			{!! Form::label('fb','Facebook', ['class'=>'submit-form']) !!}
			{!! Form::text('fb', null, array('class' => 'form-control input-lg')) !!}

			{!! Form::label('insta','Instagram', ['class'=>'submit-form']) !!}
			{!! Form::text('insta', null, array('class' => 'form-control input-lg')) !!}
			
			{!! Form::label('about','About', ['class'=>'submit-form']) !!}
			{!! Form::textarea('about', null, array('class' => 'form-control input-lg')) !!}
			
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
				{{ Form::select('level', [
					'Administrator' => 'Administrator',
					'Author' => 'Author'], $hacker->level, ['class'=>'form-control']
				) }}	
			</dl>

			<div class="row">
				<div class="col-md-6">
					<a href="{{ route('admins.show', $hacker->id) }}" class="btn btn-danger btn-block" style="margin-top: 5px;">Cancel</a>
				</div>
				<div class="col-md-6">
					{!! Form::submit('Save', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 5px')) !!}
				</div>
			</div>

		</div>

	</div>
	{!! Form::close() !!}
</div>

@endsection