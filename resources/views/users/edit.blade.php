@extends('layouts.app')

@section('page-title')
    Welcome
@endsection

@section('content')
<?php
 $locations=array(
     "Dhaka",
     "Chittagong",
     "Comilla",
     "Sylhet"
 );
?>


<div class="container">
  <div class="row">
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Just a few more information..</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                            <form method="post" action="{{ route('users.update',[$user->id]) }}">
                        {{ csrf_field() }}

                         <input type="hidden" name="_method" value="put">

                              <!--Phone no field start -->
                              <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                                    <label for="phone_no" class="control-label">Phone Number</label>
                                        <input placeholder="Optional" id="phone_no" type="text" class="form-control" 
                                        name="phone_no" value="{{ old('phone_no') }}"  autofocus>

                                        @if ($errors->has('phone_no'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone_no') }}</strong>
                                            </span>
                                        @endif
                              </div>
                              <!--Phone no field end -->

                              <!--Gender field start -->
                              <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                               <label for="gender" class="control-label">Gender<span class="required">*</span></label>
                                    <select placeholder="Gender" id="gender" type="text" class="form-control" 
                                        name="gender" value="{{ old('gender') }}" required autofocus>
                                        <option>Male</option>
                                        <option>Female</option>
                                        </select>

                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                              </div>
                              <!--Gender field end -->
                              
                              <!--NID field start -->
                              <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                                    <label for="nid" class="control-label">Nid </label>
                                        <input placeholder="Optional" id="nid" type="text" class="form-control" 
                                        name="nid" value="{{ old('nid') }}"  autofocus>

                                        @if ($errors->has('nid'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nid') }}</strong>
                                            </span>
                                        @endif
                              </div>
                              <!--NID field end -->

                              <!--BAnk acc no field start -->
                               <div class="form-group{{ $errors->has('bank_ac') ? ' has-error' : '' }}">
                                    <label for="bank_ac" class="control-label">Bank account no. </label>
                                        <input placeholder="Optional" id="bank_ac" type="text" class="form-control" 
                                        name="bank_ac" value="{{ old('bank_ac') }}"  autofocus>

                                        @if ($errors->has('bank_ac'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bank_ac') }}</strong>
                                            </span>
                                        @endif
                                </div>
                              <!--BAnk acc no field end-->

                              <!--Location field start -->
                              <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                    <label for="location" class="control-label">Location <span class="required">*</span> </label>
                                        <select class="form-control" name="location"  value="{{ old('location') }}" >
                                            <span class="caret"></span>
                                            @foreach( $locations as $location)
                                            <option>{{ $location }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('location'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                        @endif
                              </div>
                              <!--Location field end -->


                              <!--Date of birth start -->
                              <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob" class="control-label">Date of Birth <span class="required">*</span> </label>
                                        <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                              </div>
                              <!--Date of birth end -->
                            
                              <div class="form-group">
                                  <button type="submit" class="btn btn-success btn-block"> Done</button>
                              </div>

                          </form>

                      </div>
                  </div>
                 
              </div>
          </div>
      </div>
  </div>
 </div>
</div>
    

@endsection
