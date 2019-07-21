@extends('master.main')

@section('title'){{ $tag->name.' | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Find latest articles about {{ $tag->name }}." />
  <meta name="keywords" content="CMS, Blog, {{ $tag->name }}" />

@endsection


@section('content')

  <div class="col-md-8">
  
    <h3 class="head">Latest</h3>
    <hr class="hr-head">

    @if ($posts->count() > 0)

      <div class="iscroll">

        @include('partials.paginate')

        {{ $posts->links() }}

      </div>

    @else
      <center><h3 style="margin-top: 40px;">NO ARTICLE FOUND</h3></center>
    @endif
    
  </div>

@endsection


@section('recent')
  @include('partials.recent')
@endsection


@section('script')
  @include('partials.scroll_script')
@endsection