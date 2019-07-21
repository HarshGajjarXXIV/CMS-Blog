@extends('master.main')

@section('title'){{ 'Terms of Service | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Terms of Service of CMS blog" />
  <meta name="keywords" content="CMS, Blog, Terms of Service, Terms, Service" />

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