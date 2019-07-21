@extends('master.main')

@section('title'){{ 'About Us | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="About of CMS blog" />
  <meta name="keywords" content="About, About Us, Services, CMS, Blog" />

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