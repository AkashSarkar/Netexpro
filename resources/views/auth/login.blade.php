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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/select2.min.css">
    
    <script src="js/bootstrap.js"></script>
    <script src="js/app.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
   
    <!-- End of Styles -->

   

</head>

<body style="background-color:#DAD8D8">
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#side-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

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
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <!-- Authentication Links -->
                    @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>

                    @else

                    <!-- Search bar on nav bar -->
                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--Start navbar right list elements -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('home') }}" data-toggle="tooltip" data-placement="bottom" title='Home'><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#jobModal"  data-toggle="tooltip" data-placement="bottom" title='Jobs'><i class="fa fa-briefcase" aria-hidden="true"></i></a>
                        </li>
                        {{--notification dropdown--}}
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  data-toggle="tooltip" data-placement="bottom" title='See Notification'>
                              <i class="fas fa-bell fa-lg"></i>
                              <span class="badge" style="cursor:pointer;" data-toggle="tooltip" data-placement="bottom" title='{{count(auth()->User()->unreadNotifications)}} Notification'>{{count(auth()->User()->unreadNotifications)}}</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                                <li class="dropdown-header">
                                    
                                    @foreach(auth()->User()->unreadNotifications as $notification)
                                       @include('partials.notification')
                                       
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                        {{--end notification dropdown--}}

                        <li>
                        
                        
                          <a href="{{ url('profile') }}">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                           
                        </li>

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                               <i class="fas fa-sign-out-alt fa-lg"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            @include('partials.errors') @include('partials.success')

            <div class="row">
         

   

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Network Express of Professionals Ltd.</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                              {{ csrf_field() }}

                              <!--Email field start -->
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail</label>
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
                                    <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" title="Please enter your password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                </div>
                              <!--Password field end-->
                              

                              
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                             
                              <div class="form-group">      
                                  <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                  </div>
                              </div> 

                               <div class="form-group">
                                   <button type="submit" class="btn btn-success btn-block">Login</button>

                                   <a class="btn btn-default btn-block" href="{{ route('password.request') }}">Forgot Your Password?</a>
                               </div>
                          </form>

                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Strongest professional network</li>
                          <li><span class="fa fa-check text-success"></span> Connect with alumni</li>
                          <li><span class="fa fa-check text-success"></span> Find out your interests</li>
                          <li><span class="fa fa-check text-success"></span> Fast job search</li>
                          <li><span class="fa fa-check text-success"></span> Secure your career</li>
                          <li><a href="#"><u>Read more</u></a></li>
                      </ul>
                      <p><a href="/register" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
 </div>
</div>
    


</body>

</html>



