@extends('master.main')

@section('title'){{ 'Terms of Service | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="These Terms of Service constitute the agreement between Technosploit and you as a visitor of Techosploit website." />
  <meta name="keywords" content="Technosploit, Terms of Service, Terms, Service" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Terms of Service | Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="These Terms of Service constitute the agreement between Technosploit and you as a visitor of Techosploit website." />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="These Terms of Service constitute the agreement between Technosploit and you as a visitor of Techosploit website." />
  <meta name="twitter:title" content="Terms of Service | Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection


@section('content')

  <div class="col-md-8">

    <h3 class="head">Terms of Service</h3>
    <hr class="hr-head">

    <div class="body" >

      <p>Write terms of service here...</p>
  
    </div>
    
  </div>

@endsection


@section('recent')
  @include('partials.recent')
@endsection