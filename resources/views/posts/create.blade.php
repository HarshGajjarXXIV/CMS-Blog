@extends('master.admin_main')

@section('title', 'Create Post' )

@section('stylesheet')
	@include('admin_partials.tinymce')
@endsection

@section('main')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="jumbotron">

			{{ Form::open(array('route' => 'admin.store', 'files' => true)) }}

				{{ Form::label('title','Title') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}

				<br />
				{{ Form::label('category_id','Category') }}
				<select class="form-control" name="category_id">
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				@if(Auth::user()->level == 'Founder')
					<br />
					{{ Form::label('posted_by','Posted By') }}
					<select class="form-control" name="posted_by">
						@foreach ($hackers as $hacker)
							<option value="{{ $hacker->user }}">{{ $hacker->name }}</option>
						@endforeach
					</select>
				@else
					{{ Form::hidden('posted_by', Auth::user()->user) }}
				@endif

				<br />
				{{ Form::label('tags','Tags') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				<br />
				<br />
				{{ Form::label('thumbnail','Upload Thumbnail') }}
				{{ Form::file('thumbnail', null, array('required' => '')) }}
				
				<br />
				{{ Form::label('body','Body') }}
				{{ Form::textarea('body', null, array('class' => 'form-control','rows' => '50')) }}

				<br />
				{{ Form::submit('Create Post',array('class' => 'btn btn-success btn-lg btn-block')) }}

			{{ Form::close() }}
		</div>
	</div>

</div>
@endsection

@section('script')
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection