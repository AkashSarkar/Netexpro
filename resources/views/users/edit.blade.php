@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                   <form class="form-horizontal"  method="post" action="{{ route('users.update',[$user->id]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">
                
                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}"  autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender<span class="required">*</span></label>

                            <div class="col-md-6">
                                <select id="gender" type="text" class="form-control" name="gender" value="{{ old('gender') }}" required autofocus>
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

                        <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                            <label for="nid" class="col-md-4 control-label">Nid </label>

                            <div class="col-md-6">
                                <input id="nid" type="text" class="form-control" name="nid" value="{{ old('nid') }}"  autofocus>

                                @if ($errors->has('nid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_ac') ? ' has-error' : '' }}">
                            <label for="bank_ac" class="col-md-4 control-label">Bank account no. </label>

                            <div class="col-md-6">
                                <input id="bank_ac" type="text" class="form-control" name="bank_ac" value="{{ old('bank_ac') }}"  autofocus>

                                @if ($errors->has('bank_ac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_ac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location </label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date of Birth </label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}"  autofocus>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('interest') ? ' has-error' : '' }}">
                            <label for="interest" class="col-md-4 control-label">Interests</label>

                            <div class="col-md-6">
                                <input id="interest" type="text" class="form-control" name="interest" value="{{ old('interest') }}" autofocus>

                                @if ($errors->has('interest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interest') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Done
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 </div>


 @endsection
