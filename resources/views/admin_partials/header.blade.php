<!-- header -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('exploit.index') }}">
                <strong>LOGO</strong>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            	<li class="{{ Request::is('exploit') ? "active" : "" }}"><a href="{{ route('exploit.index') }}"><i class='fa fa-home fa-lg'></i>&nbsp;&nbsp;Home</a></li>
				<li class="{{ Request::is('exploit/create') ? "active" : "" }}"><a href="{{ route('exploit.create') }}"><i class='fa fa-file fa-lg'></i>&nbsp;&nbsp;Create Post</a></li>
                <li class="{{ Request::is('exploit/messages') ? "active" : "" }}"><a href="{{ route('messages.index') }}"><i class='fa fa-envelope fa-lg'></i>&nbsp;&nbsp;Messages</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class='fa fa-user fa-lg'></i>&nbsp;&nbsp;{{ Auth::user()->user }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user()->level == 'Administrator')
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <i class='fa fa-list-ul'></i>&nbsp;&nbsp;Categories
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->level == 'Administrator')
                        <li>
                            <a href="{{ route('admins.index') }}">
                                <i class='fa fa-user'></i>&nbsp;&nbsp;Admins
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('tags.index') }}">
                                <i class='fa fa-tags'></i>&nbsp;&nbsp;Tags
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('statistics.index') }}">
                                <i class='fa fa-database'></i>&nbsp;&nbsp;Statistics
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admins.password') }}">
                                <i class='fa fa-lock'></i>&nbsp;&nbsp;Change Password
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('exploit.logout') }}">
                                <i class='fa fa-sign-out'></i>&nbsp;&nbsp;Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav><!-- end header -->