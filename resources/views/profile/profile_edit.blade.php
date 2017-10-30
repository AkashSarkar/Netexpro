@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                   <form class="form-horizontal"  method="post" action="{{ route('profile.update',[Auth::user()->id]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <!-- Education -->
                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Education</label>

                            <div class="col-md-6">
                                <input placeholder="Institution Name" id="education" type="text" class="form-control" name="education" value="{{ $user->education }}" autofocus>

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Email-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Phone number -->
                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input placeholder="Optional" id="phone_no" type="text" class="form-control" 
                                name="phone_no" value="{{ $user->phone_no }}"  autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- Gender -->
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender<span class="required">*</span></label>

                            <div class="col-md-6">
                                <select placeholder="Gender" id="gender" type="text" class="form-control" 
                                name="gender" value="{{ $user->gender }}" autofocus>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <!-- Date of birth -->
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date of Birth <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ $user->dob }}" autofocus>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                         <!-- location -->
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input placeholder="location" id="location" type="text" class="form-control" 
                                name="location" value="{{ $user->location }}"  autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <!-- Availability-->
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Availability<span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input placeholder="available for a job??" id="availability" type="text" class="form-control" 
                                name="availability" value="{{ $user->available_for_job }}" autofocus>

                                @if ($errors->has('availability'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('availability') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Update
                                </button>
                            </div>
                        </div>
                      

                    </form>
                </div>
            </div>
        </div>
 </div>


 @endsection
