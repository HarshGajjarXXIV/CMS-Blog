<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">

    <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ route('home') }}">
          <strong>LOGO</strong>
        </a>

    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">

        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">

          <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ route('home') }}">Home</a></li>
          
          <li class="{{ Request::is('category/menu1') ? "active" : "" }}"><a href="{{ route('category', $name='menu1') }}">Menu 1</a></li>

          <li class="dropdown
            @if(Request::is('category/submenu11') or Request::is('category/submenu12'))
              {{ 'active' }}
            @endif
          ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown Menu 1 <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">
              <li class="{{ Request::is('category/submenu11') ? "active" : "" }}">
                <a href="{{ route('category', $name='submenu11') }}">Sub Menu 1</a>
              </li>
              <li class="{{ Request::is('category/submenu12') ? "active" : "" }}">
                <a href="{{ route('category', $name='submenu12') }}">Sub Menu 2</a>
              </li>
            </ul>
          </li>

          <li class="dropdown
            @if(Request::is('category/submenu21') or Request::is('category/submenu22') or Request::is('category/submenu23'))
              {{ 'active' }}
            @endif
          ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown Menu 2 <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">
              <li class="{{ Request::is('category/submenu21') ? "active" : "" }}">
                <a href="{{ route('category', $name='submenu21') }}">Sub Menu 1</a>
              </li>
              <li class="{{ Request::is('category/submenu22') ? "active" : "" }}">
                <a href="{{ route('category', $name='submenu22') }}">Sub Menu 2</a>
              </li>
              <li class="{{ Request::is('category/submenu23') ? "active" : "" }}">
                <a href="{{ route('category', $name='submenu23') }}">Sub Menu 3</a>
              </li>
            </ul>
          </li>

          <li class="{{ Request::is('category/menu2') ? "active" : "" }}"><a href="{{ route('category', $name='menu2') }}">Menu 2</a></li>

          <li class="dropdown
            @if(Request::is('about') or Request::is('contact') or Request::is('privacy-policy') or Request::is('terms-of-service'))
              {{ 'active' }}
            @endif
          ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">
              <li class="{{ Request::is('about') ? "active" : "" }}">
                <a href="{{ route('about') }}">About Us</a>
              </li>
              <li class="{{ Request::is('contact') ? "active" : "" }}">
                <a href="{{ route('contact') }}">Contact Us</a>
              </li>
              <li class="{{ Request::is('privacy-policy') ? "active" : "" }}">
                <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
              </li>
              <li class="{{ Request::is('terms-of-service') ? "active" : "" }}">
                <a href="{{ route('terms') }}">Terms of Service</a>
              </li>
            </ul>
          </li>

        </ul>

        <!-- Search -->
        {{ Form::open(['route' => ['result'], 'method' => 'GET', 'class' => 'navbar-form navbar-right']) }}
          <div class="input-group">
            {{ Form::text('key', null, ['placeholder'=>'Search', 'required'=>'', 'class' => 'form-control my-form'])}}
            <div class="input-group-btn">
              <button class="btn btn-danger" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        {{ Form::close() }}

    </div>
    
  </div>
</nav>