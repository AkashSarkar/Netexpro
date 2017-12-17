@extends('layouts.app')

@section('page-title')
    Login
@endsection

@section('content')
<div class="container">
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

@endsection
