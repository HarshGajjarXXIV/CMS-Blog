@extends('master.main')

@section('title', 'CMS Blog' )

@section('metatags')

  <meta name="description" content="CMS Blog" />
  <meta name="keywords" content="CMS, Blog" />
  
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