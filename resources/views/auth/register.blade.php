@extends('layouts.app')

@section('page-title')
    Registration
@endsection


@section('content')
<?php
$educations = array(
    "United International University",
    "Ahsanullah University of Science and technology",
    "BUET",
    "DU",
    "NSU",
    "ULAB"
);
?>

<div class="container">
    <div class="row">

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              
              <h4 class="modal-title" id="myModalLabel">Registration</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="loginForm" method="POST" action="{{ route('register') }}" novalidate="novalidate">
                              {{ csrf_field() }}



                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname" class="control-label">FirstName</label>
                                      <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" title="Please enter you firstname" required autofocus>
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname" class="control-label">LastName</label>
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" title="Please enter you lastname"  required autofocus>
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label> 
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" title="Please enter you email" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" title="Please enter you password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="control-label">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" title="Please confirm password"  required>
                                </div>

                                <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                                    <label for="education" class="control-label">Education</label>
                                     <select class="form-control" name="education"  value="{{ old('educations') }}"  multiple="multiple" id="education">
                                            
                                                <span class="caret"></span>
                                                @foreach( $educations as $education)
                                                <option>{{ $education }}</option>
                                                @endforeach
                                            </select>

                                        @if ($errors->has('education'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('education') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                

                                
                                  <div class="form-group">
                                   <button type="submit" class="btn btn-success btn-block">Register</button>

                               </div>
                          </form>

                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
    
@endsection

