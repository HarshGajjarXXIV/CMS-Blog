@extends('master.admin_main')

@section('title', 'Add Admin' )

@section('main')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="jumbotron">
			<center><h3>Add Admin</h3></center>
			<hr width="40%" style="height:10px; color: black;" >

			{!! Form::open(array('route' => 'admins.store', 'files' => true)) !!}

				{!! Form::label('name','Full Name', ['class'=>'submit-form']) !!}
				{!! Form::text('name', null, array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::label('user','Username', ['class'=>'submit-form']) !!}
				{!! Form::text('user', null, array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::label('email','Email', ['class'=>'submit-form']) !!}
				{!! Form::email('email', null, array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::label('role','Role', ['class'=>'submit-form']) !!}
				<select class="form-control" name="level">
					<option value="Administrator">Administrator</option>
					<option value="Author">Author</option>
				</select>

				{!! Form::label('password','Password', ['class'=>'submit-form']) !!}
				{!! Form::password('password', array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::label('cpassword','Confirm Password', ['class'=>'submit-form']) !!}
				{!! Form::password('confirm_password', array('class' => 'form-control', 'required' => '')) !!}

				{!! Form::submit('Add Admin',array('class' => 'btn btn-success btn-lg btn-block submit-form')) !!}

			{!! Form::close() !!}

		</div>
	</div>

</div>
@endsection