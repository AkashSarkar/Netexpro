@extends('layouts.app')

@section('page-title')
    Welcome
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@section('content')
<?php
  $professions = array(
    "CSE",
    "EEE",
    "BBA",
    "MBA",
    "MSCSE"
);

 $interests = array(
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

                        
                        <div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
                            <label for="interests" class="col-md-4 control-label">interests</label>

                            <div class="col-md-6">
                                 
                                    <select class="form-control" name="interests[]"  value="{{ old('interests') }}"  multiple="multiple" id="interest">
                                        <span class="caret"></span>
                                        @foreach( $interests as $interest)
                                        <option>{{ $interest }}</option>
                                        @endforeach
                                    </select>

                                @if ($errors->has('interests'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interests') }}</strong>
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script>
 $(document).ready(function(){
   $('#interest').select2({
       placeholder:"selectinterest",
       tags:true;
   });
 });
 </script>
