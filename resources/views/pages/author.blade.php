@extends('master.main')

@section('title'){{ $hacker->name.' | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="{!! substr($hacker->about, 0, 150) !!}" />
  <meta name="keywords" content="Technosploit, Author, {{ $hacker->name }}" />
  <meta name="author" content="{{$hacker->name}}" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="{{ $hacker->name }} | Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="{!! substr($hacker->about, 0, 150) !!}" />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="{!! substr($hacker->about, 0, 150) !!}" />
  <meta name="twitter:title" content="{{ $hacker->name }} | Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection


@section('content')

   <div class="col-md-8">

    <!-- author profile -->
    @include('partials.author_profile')
    <!-- end author profiles -->
  
    <h3 class="head">Articles</h3>
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