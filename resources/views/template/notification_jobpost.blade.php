@extends('layouts.app')

@section('content')
<!--job hire post-->
<div class="col-md-3 col-sm-3 bg-light sidebar">
      <nav class="nav-sidebar">
        <div class="collapse navbar-collapse" id="side-navbar-collapse">
          <ul class="nav">
           
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
@foreach($jobposts as $jobpost)
<div class="panel panel-default">
  <div class="panel-body">


    <section class="post-heading">
      <div class="row">
        <div class="col-md-12">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$jobpost->p_pic}}" width="40" height="40"
                  alt="...">
              </a>
            </div>
            <div class="media-body">
              @if($jobpost->user_id == Auth::user()->id)
              
              <div class="dropdown ">
                <button class="pull-right dropdown-toggle   btn btn-link" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="#" onclick="
                       var result = confirm('Are you sure you want to delete this post?');
                       
                       if( result){
                         event.preventDefault();
                         document.getElementById('delete-form2').submit();
                        }
                              ">

                      Delete

                    </a>

                    <form id="delete-form2" action="{{ route('jobpost.destroy', $jobpost->jobpost_id) }}" method="POST" style="display:none;">
                      <input type="hidden" name="_method" method="PUT" value="delete"> {{ csrf_field() }}
                    </form>

                  </li>
                </ul>
              </div>
              @endif
              <a href="#" class="anchor-username">
                <h4 class="media-heading"> {{$jobpost->firstname}}</h4>
              </a>

              <a href="#" class="anchor-time">{{ $jobpost->created_at }}</a>
            </div>
          </div>
        </div>

      </div>
    </section>
    <section class="post-body well well-lg" style="background-color: #CFD8DC; border-radius: 4px;">
      <h4 style="font-weight:bold;">******Hiring post******</h4>
      <p>
        <li>Position :
          <strong>{{ $jobpost->position }}</strong>
        </li>
      </p>
      <p>
        <li>Profession :
          <strong>{{ $jobpost->profession}}</strong>
        </li>
      </p>
      <p>
        <li>No. of Vacancy :
          <strong>{{ $jobpost->vacancy_number }}</strong>
        </li>
      </p>
      <p>
        <li>Job Circular:
          <strong>{{ $jobpost->circular }}</strong>
        </li>
      </p>
      <p>
        <li>Company Details:
          <strong>{{ $jobpost->company_details }}</strong>
        </li>
      </p>
      <p>
        <li>Job Responsibilities:
          <strong>{{ $jobpost->job_details }}</strong>
        </li>
      </p>
      <p>
        <li>Job Location :
          <strong>{{ $jobpost->location }}</strong>
        </li>
      </p>

    </section>
    <!--Applicants List-->
    @if($jobpost->user_id == Auth::user()->id )
    @include('template._applicantsModal')
    @endif      

    <!--End Applicants list-->
    <hr>
    <section class="post-footer">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-unstyled">
            <li>
              <a href="#">
                <button class="btn btn-md btn-primary">Accept Invitation</button></a>
            </li>
           
          </ul>
        </div>

      </div>
</section>

  </div>
</div>
@endforeach
</div>
<!--end job post-->
@endsection