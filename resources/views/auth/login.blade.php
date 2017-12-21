<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/select2.min.css">
    
    <script src="js/bootstrap.js"></script>
    <script src="js/app.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="js/particle.js"></script>
    <!-- End of Styles -->

   

</head>

<body style="background-color:black;">
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('home') }}">
                        Netexpro
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Authentication Links -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




  <div id="login-box">
    <div class="logo">
      <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img img-responsive img-circle center-block"/>
      <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
    </div><!-- /.logo -->

 <form method="POST" action="{{ route('login') }}">
                              {{ csrf_field() }}

    <div class="controls">
      <!--Email field start -->
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" title="Please enter you email" required autofocus placeholder="example@gmail.com">
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
     </div>
     <!--Email field end -->

     <!--Password field start -->
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
           <input id="password" type="password" class="form-control" name="password" placeholder="Password"  title="Please enter your password" required>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
      </div>
    <!--Password field end-->

      <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
      
      <div class="form-group">      
          <div class="checkbox" style="color: #fff;">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
      </div> 

       <div class="form-group">
           <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>

           <a class="btn btn-default btn-block" href="{{ route('password.request') }}">Forgot Your Password?</a>
       </div>

    </div><!-- /.controls -->

  </form>

  </div><!-- /#login-box -->

<div id="particles-js"></div>
         
 </div>
</body>

</html>



