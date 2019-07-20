<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name='viewport' content='width=device-width' initial-scale='1.0'>

	<title>@yield('title')</title>

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @yield('stylesheet')

	<!-- favicons -->
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

 </head>

 <body>

 	@include('admin_partials.header')

	<!-- main section -->
	<div class="container" style="margin-bottom: 50px; margin-top: 50px">

        @include('partials.messages')
		@yield('main')

	</div><!-- end main section -->

    <!-- Java Script --> 
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')

 </body>

 </html>