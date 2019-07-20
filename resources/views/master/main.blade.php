<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name='viewport' content='width=device-width' initial-scale='1.0'>

  <title>@yield('title')</title>

  <!-- meta tags -->
  <meta name="theme-color" content="#222222" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#222222" />
  @yield('metatags')
  <!-- end meta tags -->

  <!-- css -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- end css -->

  <!-- favicons -->
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

</head>

<body>

  <!-- header -->
  @include('partials.header')
  <!-- end header -->

  <!-- main section -->
  <div class="container container-fix">

    <div class="row">

      <!-- content section -->
      @yield('content')
      <!-- end content section -->

      <!-- sidebar -->
      @include('partials.sidebar')
      <!-- end sidebar -->

    </div>

  </div><!-- end main section -->

  <!-- footer -->
  @include('partials.footer')
  <!-- end footer -->

  <!-- java script --> 
  <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('script')
  <!-- end java script --> 

</body>

</html>