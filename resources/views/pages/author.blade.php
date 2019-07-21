@extends('master.main')

@section('title'){{ $hacker->name.' | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="{!! substr($hacker->about, 0, 150) !!}" />
  <meta name="keywords" content="CMS, Blog, Author, {{ $hacker->name }}" />
  <meta name="author" content="{{$hacker->name}}" />
  
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