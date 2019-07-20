@extends('master.main')

@section('title'){{ 'About Us | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Our task is to explore and observe the world, because there is always something somewhere incredible just waiting to be discovered. Through photos, videos and stories, we will give you a close-up look on latest technology and innovation." />
  <meta name="keywords" content="Technosploit, About, About Us, Services" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="About Us | Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="Our task is to explore and observe the world, because there is always something somewhere incredible just waiting to be discovered. Through photos, videos and stories, we will give you a close-up look on latest technology and innovation." />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="Our task is to explore and observe the world, because there is always something somewhere incredible just waiting to be discovered. Through photos, videos and stories, we will give you a close-up look on latest technology and innovation." />
  <meta name="twitter:title" content="About Us | Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection


@section('content')

  <div class="col-md-8">

    <h3 class="head">About Us</h3>
    <hr class="hr-head">

    <div class="body">

      <p>Write about description here...</p>
    
    </div>
    
  </div>

@endsection


@section('recent')
  @include('partials.recent')
@endsection