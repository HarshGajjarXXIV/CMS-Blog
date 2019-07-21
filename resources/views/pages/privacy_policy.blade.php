@extends('master.main')

@section('title'){{ 'Privacy Policy | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="The privacy policy of CMS blog." />
  <meta name="keywords" content="CMS, Blog, Privacy, Privacy Policy" />

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