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
    "MSCSE",
    "Marketing"
);
$industries= array(
    "Software",
    "IT",
    "Hardware"

);
?>


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
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="loginForm" onsubmit="return validateForm()" method="POST" action="{{ route('interests.store')}}" >
                              {{ csrf_field() }}

                              <!--Profession field start -->
                              <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                                <label for="profession" class="control-label">Profession<span class="required">*</span></label>
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
                              <!--Profession field end -->
                             
                              <!--Industry field start -->
                              <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                                    <label for="industry" class="control-label">Industry<span class="required">*</span></label>
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
                              <!--Industry field end-->

                              <!--Interest field start -->
                                <div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
                                    <label for="interests" class="control-label">interests</label>
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
                                <div id="error"></div>
                               <!--Interest field end -->      

                                <div class="form-group">
                                   <button type="submit" class="btn btn-success btn-block">Next..</button>
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script>
 $(document).ready(function(){
   $('#interest').select2({
       placeholder:"selectinterest",
       tags:true;
   });
 });
 </script>
 <script>
  function validateForm() {
  var options = document.getElementById('interest').options, count = 0;
    for (var i=0; i < options.length; i++) {
     if (options[i].selected) count++;
    }
     if(count>5)
     {
         var message=document.getElementById('error');
         message.innerHTML="maximum 5 interset can be selected";
         return false;
     }
    
   }
 </script>
