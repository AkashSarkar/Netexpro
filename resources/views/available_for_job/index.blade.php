@extends('layouts.app') 

@section('page-title') Activity Log @endsection 


@section('content')

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
               <a href="{{ url('jobpost') }}" class="button_connection button_m  btn" 
                 data-placement="bottom" title= 'All Jobposts' data-toggle="tooltip"
                 style="color: inherit; text-decoration: inherit;">
                 
               <i class="fa fa-briefcase" aria-hidden="true"></i>  All Jobposts</a>
              <br>
            </section>

          </ul>

        </div>
      </nav>
    </div>

   @include('template.user_available_post_interface')


</div>
</div>
</div>

@endsection