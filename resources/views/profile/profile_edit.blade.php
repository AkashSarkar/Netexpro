@extends('layouts.app')

@section('content')

<?php
$educations=array(
    "United International University",
    "Ahsanullah University of Science and technology",
    "BUET",
    "DU",
    "NSU"
);
?>

<div class="row">
        <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-primary">
                <div class="panel-heading">Update Personal Information</div>

                <div class="panel-body">
                   <form class="form-horizontal"  method="post" action="{{ route('profile.update',[Auth::user()->id]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <!-- Education -->
                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Education</label>

                            <div class="col-md-6">
                               <!-- <input placeholder="Institution Name" id="education" type="text" class="form-control" name="education" value="{{ $user->education }}" autofocus>-->

                               <select class="form-control" name="education"  value="{{ old('education')}}" >
                                 <span class="caret"></span>
                                 <option>{{ $user->education }}</option>
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
                                @if ($user->gender=="Female")
                                <option>Female</option>
                                <option>Male</option>
                                
                                @elseif ($user->gender=="Male")
                                <option>Male</option>
                                <option>Female</option>
                               
                                @else
                                <option>Select-Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                @endif
                               

                                
                                   
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
                                <select placeholder="available for a job??" id="available_for_job" type="text" class="form-control" 
                                name="available_for_job" value="{{ $user->available_for_job }}" autofocus>
                                @if ($user->available_for_job=="yes")
                                <option>Yes</option>
                                <option>No</option>
                                
                                @elseif ($user->available_for_job=="No")
                                <option>No</option>
                                <option>Yes</option>
                               
                                @else
                                <option>Select-Availability</option>
                                <option>Yes</option>
                                <option>No</option>
                                @endif
                                </select>

                                @if ($errors->has('available_for_job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('available_for_job') }}</strong>
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
