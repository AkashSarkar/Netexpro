@extends('layouts.app')

@section('page-title')
    Password Reset
@endsection

@section('content')


<div class="container">
    <div class="row">

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Password reset</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                          <form id="loginForm" method="POST" action="{{ route('password.email') }}" >
                              {{ csrf_field() }}

                             
                              <!--Email field for password reset start -->
                               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail</label>
                                     <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                               <!--Email field for password reset end -->

                               <div class="form-group">
                                    
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Send Password Reset Link
                                        </button>
                                  
                               </div>
                            
                          </form>

                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
   </div>
  </div>

@endsection
