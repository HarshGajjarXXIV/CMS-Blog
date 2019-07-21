@extends('master.main')

@section('title'){{ 'CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Search result on CMS blog." />
  <meta name="keywords" content="CMS, Blog, Search, Result" />

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


