@extends('master.main')

@section('title'){{ 'CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Search for latets tech news, android tricks, programming, cyber security tips and tutorials on Technosploit blog." />
  <meta name="keywords" content="Technosploit, Search, Result" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="Search for latets tech news, android tricks, programming, cyber security tips and tutorials on Technosploit blog." />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="Search for latets tech news, android tricks, programming, cyber security tips and tutorials on Technosploit blog." />
  <meta name="twitter:title" content="Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection


@section('content')

  <div class="col-md-8">
  
    <h3 class="head">Search Result</h3>
    <hr class="hr-head">

    @if ($posts->count() > 0)

      <div class="iscroll">

        @include('partials.paginate')

        {{ $posts->appends(Request::only('key'))->links() }}

      </div>

    @else
      <center><h3 style="margin-top: 40px;">NO RESULT FOUND</h3></center>
    @endif
    
  </div>

@endsection


@section('recent')
  @include('partials.recent')
@endsection


@section('script')
  @include('partials.scroll_script')
@endsection


