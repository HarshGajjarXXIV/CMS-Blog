<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width' initial-scale='1.0'>

  <title>Admin Login</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">

  <!-- favicons -->
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

</head>

<body>

  <!-- main section -->
  <div class="container">

    @include('partials.messages')

    <div class="row" style="margin-top: 80px">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">

          <div class="panel-heading"><center><h4><b>Admin Login</b></h4></center></div>

          <div class="panel-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                  <label for="user" class="col-md-4 control-label">Username</label>

                  <div class="col-md-6">
                      <input id="user" type="text" class="form-control" name="user" value="{{ old('user') }}" required autofocus placeholder="Username...">

                      @if ($errors->has('user'))
                          <span class="help-block">
                              <strong>{{ $errors->first('user') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Password</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password" required placeholder="Password...">

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <b>Remember Me</b>
                          </label>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-8 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                          Login
                      </button>
                  </div>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div><!-- end main section -->

  <!-- Java Script --> 
  <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>