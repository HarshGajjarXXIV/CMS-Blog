@extends('master.main')

@section('title'){{ $post->title.' | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="{!! substr($post->body, 3, 150) !!}" />
  <meta name="keywords" content="CMS, Blog, {{ $post->category->name }}@foreach ($post->tags as $tag), {{$tag->name}}@endforeach" />

@endsection


@section('content')

  <div class="col-md-8" >
    
    <div style="margin-top: 80px;">

      <img src="{{ asset('images/head/'.$post->thumbnail) }}">

      <div class="panel-body">

        <a href="{{ Request::url() }}"><h3>{{ $post->title }}</h3></a>

        <div class="p_ditails">

          <i class="fa fa-folder">&nbsp;<a href="{{ route('category', str_slug($post->category->name)) }}">{{ $post->category->name }}</a></i>
          <i class="fa fa-clock-o">&nbsp;<spam>{{ date('M j, Y', strtotime($post->created_at)) }}</spam></i>
          <i class="fa fa-user">&nbsp;<a href="{{ route('author', $post->posted_by) }}">{{ $hacker->name }}</a></i>

          @if($post->tags->count() > 0)
          
            <br />

            <i class="fa fa-tags"></i>
            @foreach($post->tags as $tag)
              <a href="{{ route('tag', str_slug($tag->name)) }}" ><sapn class="label label-default">{{ $tag->name }}</sapn></a>
            @endforeach

          @endif

        </div>

        <div class="sharethis-inline-share-buttons"></div>

        <div class="body" style="margin-top: 20px;">
          {!! $post->body !!}
        </div>

      </div>

    </div>

    <!-- related -->
    @include('partials.related')
    <!-- end related -->

    <!-- comments -->
    @include('partials.comments')
    <!-- end comments -->

  </div>

@endsection


@section('recent')
  @include('partials.recent')
@endsection


@section('script')
  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=596322e06b0f56001255f951&product=inline-share-buttons"></script>
@endsection