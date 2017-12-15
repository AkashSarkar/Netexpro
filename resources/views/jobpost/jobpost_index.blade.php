@extends('layouts.app') 

@section('page-title') All Jobpost @endsection 

@section('content')

<?php
$professions = array(
    "CSE",
    "EEE",
    "BBA",
    "MBA",
    "MSCSE"
);

 $locations=array(
     "Dhaka",
     "Chittagong",
     "Comilla",
     "Sylhet"
 );
?>
<!--Main content-->
<div class="container">
  <div class="row content">
    <!--side bar content-->

    <div class="col-md-3 col-sm-3 bg-light sidebar">
      <nav class="nav-sidebar">
        <div class="collapse navbar-collapse" id="side-navbar-collapse">
          <ul class="nav">
            <li>
              <!--profile button-->
              <div class="media button_profile button_m " id="bp">
              <a href="{{ url('profile') }}">
                <div class="media-left ">
                  <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="20"
                    height="20" alt="...">
                </div>
                <div class="media-body" data-toggle="tooltip" data-placement="bottom" title="{{$user->firstname }} {{$user->lastname }}">
                  <h5 class="media-heading"> {{$user->firstname }} {{$user->lastname }}</h5>
                </div>
              </a>
            </div>
            <!--end profile button-->

            </li>
           

             <section>
             <button type="submit" class="button_connection button_m  btn" data-toggle="tooltip"
             data-placement="bottom" title= 'All Jobposts'>
            <a href="{{ url('jobpost') }}" style="color: inherit; text-decoration: inherit;">
            <i class="fa fa-briefcase" aria-hidden="true"></i>  All Jobposts</a></button>
           <br>
            </section>

          </ul>

        </div>
      </nav>
    </div>

<div class="col-md-7 col-sm-7 col-lg-7 show_home_post" id="h_post">

 
<!--search using profession, location, date range start -->
     
  <div class="row">
    <div class="col-md-12 col-lg-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search here.." />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                           
                           
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal"  method="POST" action="/search" role="search">
                                         {{ csrf_field() }}
                                 
                                  <!--Search by profession start-->
                                  <div class="form-group {{ $errors->has('choice') ? ' has-error' : '' }}">
                                      <label for="choice">Profession : </label><br>
                                         <select class="form-control" name="choice" value="{{ old('choice') }}"style="width:100%">
                                              <span class="caret"></span>
                                              <option value="0">select a profession</option>
                                              @foreach( $choices as $choice)
                                              <option>{{ $choice->profession }}</option>
                                              @endforeach
                                          </select>
                                          @if ($errors->has('choice'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('choice') }}</strong>
                                              </span>
                                          @endif
                                  </div>
                                  <!--Search by profession end-->
                                   
                                  <!--Search by location start-->
                                  <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                      <label for="location">Location : </label><br>
                                            <select class="form-control" name="location"  value="{{ old('location') }}" style="width:100%" >
                                                  <span class="caret"></span>
                                                  <option value="0">select a location</option>
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
                                   <!--Search by location end-->

                                   <!--Search by date range start-->
                                   <div class="form-group">
                                     <label for="choice">From : </label>
                                     <input class="form-control" type="date" name="fromdate" placeholder="From">
                                    </div>
                                    <div class="form-group">
                                     <label for="choice">To : </label>
                                     <input class="form-control" type="date" name="todate" placeholder="To"  >
                                    </div>
                                    <!--Search by date range end-->

                                    <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                    
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
      </div>
      
<!--search using profession, location, date range end -->

     <!--job hiring post show start-->
     
      @include('template.jobHirePost_Interface')

     <!--job hiring post show end -->

 </div>
    </div>
    </div>
@endsection