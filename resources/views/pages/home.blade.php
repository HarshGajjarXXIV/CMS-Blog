@extends('master.main')

@section('title', 'CMS Blog' )

@section('metatags')

  <meta name="description" content="CMS Blog" />
  <meta name="keywords" content="CMS, Blog" />

<!--   <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="website" />
  <meta property="og:title" content="CMS Blog" />
  <meta property="og:description" content="CMS Blog" />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="CMS Blog"/>
  <meta property="fb:app_id" content="" /> -->

<!--   <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="CMS Blog" />
  <meta name="twitter:title" content="CMS Blog" />
  <meta name="twitter:site" content="" />
  <meta name="twitter:url" content="{{ Request::url() }}" /> -->
  
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


@section('script')
  @include('partials.scroll_script')
@endsection