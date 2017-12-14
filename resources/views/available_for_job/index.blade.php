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
              <div class="media button_profile button_m " id="bp" style="padding-left: 35px;">
                <a href="{{ url('profile') }}">
                  <div class="media-left ">
                    <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user->p_pic}}" width="20"
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
              data-placement="bottom" title= ' All Jobposts'>
             <a href="{{ url('jobpost') }}" style="color: inherit; text-decoration: inherit; margin-left: 5px; padding-left: 20px;">
             <i class="fa fa-briefcase" aria-hidden="true"></i>  All Jobposts</a></button>
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