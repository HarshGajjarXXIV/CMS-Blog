@extends('master.admin_main')

@section('title','Edit Post')

@section('stylesheet')
	@include('admin_partials.tinymce')
@endsection

@section('main')

<div class="row">
	{{ Form::model($post, ['route' => ['admin.update', $post->id], 'method' => 'PUT', 'files' => true]) }}
	<div class="col-md-8">
		<div class="jumbotron">

			<!-- title -->
			{{ Form::label('title','Title') }}
			{{ Form::text('title', null, array('class' => 'form-control input-lg', 'required' => '')) }}

			<br />

			<!-- post head image -->
			{{ Form::label('thumbnail','Update Thumbnail: Only select image if you want to update previous image.') }}
			{{ Form::file('thumbnail') }}

			<br />

			<!-- main post -->
			<div class="post">
				{{ Form::label('body','Body') }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '50')) }}
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
				<dd>
					{{ Form::select('category_id', $categories, null, array('class' => 'form-control')) }}
				</dd>
			</dl>

			@if(Auth::user()->level == 'Founder')
				<dl class="dl">
					<dt>Posted by</dt>
					<dd>
						{{ Form::select('posted_by', $hackers, null, array('class' => 'form-control')) }}
					</dd>
				</dl>
			@else
				{{ Form::hidden('posted_by', Auth::user()->user) }}
			@endif

			<dl class="dl">
				<dt>Tags</dt>
				<dd>
					{{ Form::select('tags[]', $tags, null, array('class' => 'form-control select2-multi', 'multiple' => 'multiple')) }}
				</dd>
			</dl>

			<div class="row">
				<div class="col-md-6">
					<a href="{{ route('admin.show', $post->urltext) }}" class="btn btn-danger btn-block" style="margin-top: 5px;">Cancel</a>
				</div>
				<div class="col-md-6">
					{{ Form::submit('Save', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 5px')) }}
				</div>
			</div>

		</div>

	</div>
	{{ Form::close() }}
</div>

@endsection

@section('script')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
	$('.select2-multi').select2();
	$('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
</script>
@endsection