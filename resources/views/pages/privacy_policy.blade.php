@extends('master.main')

@section('title'){{ 'Privacy Policy | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="The privacy policy describes the kinds of information we may gather during your visit to Technosploit Site, how we use your information." />
  <meta name="keywords" content="Technosploit, Privacy, Privacy Policy" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Privacy Policy | Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="The privacy policy describes the kinds of information we may gather during your visit to Technosploit Site, how we use your information." />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="The privacy policy describes the kinds of information we may gather during your visit to Technosploit Site, how we use your information." />
  <meta name="twitter:title" content="Privacy Policy | Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection

@section('content')

  <div class="col-md-8">

    <h3 class="head">Privacy Policy</h3>
    <hr class="hr-head">

  
    <div class="body">

      <p>Write privacy policy here...</p>
    
    </div>

  </div>

@endsection


@section('recent')
  
  @include('partials.recent')

@endsection