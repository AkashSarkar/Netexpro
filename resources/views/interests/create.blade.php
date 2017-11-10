@extends('layouts.app')

@section('content')
<?php
  $professions = array(
    "CSE",
    "EEE",
    "BBA",
    "MBA",
    "MSCSE"
);
$industries= array(
    "Software",
    "IT",
    "Hardware"

);
?>
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                   <form class="form-horizontal"  method="POST" action="{{ route('interests.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                            <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>

                            <div class="col-md-6">
                              <!--  <input id="profession" type="text" class="form-control" name="profession" value="{{ old('profession') }}" required autofocus>-->
                                     <select class="form-control" name="profession"  value="{{ old('profession') }}">
                                        <span class="caret"></span>
                                        @foreach( $professions as $profession)
                                        <option>{{ $profession }}</option>
                                        @endforeach
                                    </select>




                                @if ($errors->has('profession'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                            <label for="industry" class="col-md-4 control-label">Industry<span class="required">*</span></label>

                            <div class="col-md-6">
                            <!--    <input id="industry" type="text" class="form-control" name="industry" value="{{ old('industry') }}" required autofocus>-->
                                 
                                <select class="form-control" name="industry"  value="{{ old('industry') }}">
                                        <span class="caret"></span>
                                        @foreach( $industries as $industry)
                                        <option>{{ $industry }}</option>
                                        @endforeach
                                    </select>


                                
                                @if ($errors->has('industry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Next..
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 </div>


 @endsection
