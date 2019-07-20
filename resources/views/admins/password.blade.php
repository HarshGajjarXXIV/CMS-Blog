@extends('master.admin_main')

@section('title', 'Change Password' )

@section('main')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="jumbotron">

			{!! Form::open(array('route' => 'password.update')) !!}

				{!! Form::label('current_password','Current Password', ['class'=>'submit-form']) !!}
				{!! Form::password('current_password', array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::label('new_password','New Password', ['class'=>'submit-form']) !!}
				{!! Form::password('new_password', array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::label('confirm_password','Confirm New Password', ['class'=>'submit-form']) !!}
				{!! Form::password('confirm_password', array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::submit('Change Password',array('class' => 'btn btn-success btn-block submit-form')) !!}

			{!! Form::close() !!}

		</div>
	</div>

</div>
@endsection