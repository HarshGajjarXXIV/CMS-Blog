@extends('master.main')

@section('title'){{ $tag->name.' | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Find latest articles about {{ $tag->name }} on Technosploit blog." />
  <meta name="keywords" content="Technosploit, {{ $tag->name }}" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="{{ $tag->name }} | Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="Find latest articles about {{ $tag->name }} on Technosploit blog." />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="Find latest articles about {{ $tag->name }} on Technosploit blog." />
  <meta name="twitter:title" content="{{ $tag->name }} | Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection


@section('featured')

  <h3 class="head">{{ $tag->name }}</h3>
  <hr class="hr-head">

  @if ($featuredposts->count() > 0)

    @include('partials.featured')

  @else
    <center><h3 style="margin-top: 40px;">NO ARTICLE FOUND</h3></center>
  @endif

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