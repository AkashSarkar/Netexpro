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
        <li>Salary Range:
          <strong>{{ $jobpost->salary_range }}</strong>
        </li>
      </p>
      <p>
        <li>Job Location :
          <strong>{{ $jobpost->location }}</strong>
        </li>
      </p>

    </section>
    <!--Applicants List-->
     <?php $applicant_count=0; $fla=0 ;?> 
    @foreach($job_applicants as $applicant_info) 
        @if($applicant_info->jobpost_id==$jobpost->jobpost_id)
            <?php $applicant_count=$applicant_count+1; $job_post_id=$applicant_info->jobpost_id?>
            
        @endif 
    @endforeach 
    @if($jobpost->user_id == Auth::user()->id )
      @include('template._applicantsModal')
    @endif      

    <!--End Applicants list-->
    <hr>
    @if($applicant_count!=0 && $jobpost->user_id == Auth::user()->id) 
    <section class="post-footer">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-unstyled" style="color:green; font-weight:600; font-size:16;cursor:pointer; ">
            <span data-toggle="modal" data-target="#applicantModal<?php echo  $job_post_id ;echo $applicant_count;?>">
                <li>
                  <i class="fas fa-users"></i> Applicants
                </li>
            </span>
           </ul>

        </div>
 
       </div>
 </section>
      @endif

    <hr>
    @if($type=="App\Notifications\jobOffers")
    <section class="post-footer">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-unstyled">
          <?php $hireflag=0 ;?>
          @foreach($is_hired as $is_hire)
            @if($jobpost->jobpost_id==$is_hire->hire_post_id && $is_hire->is_invitaion_accepted==1)
            <li>
               <button class="btn btn-sm btn-success" 
                 style="float:right; margin-top:25px; margin-right:5px;" disable>Accepted</button>
            </li>
             <?php $hireflag++; ?>
            @break
            @endif
          @endforeach 
          @if($hireflag==0)
            <li>
              <form method="post"  
                action="{{ route('acceptInvite',['id'=>$jobpost->jobpost_id])}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="employer" value="{{$jobpost->user_id}}">
                
                <button class="btn btn-sm btn-primary" 
                 style="float:right; margin-top:25px; margin-right:5px;">Accept Invitation</button>
            </form>
            </li>
            @endif
         
          </ul>
        </div>

      </div>
    </section>
    @endif
  </div>
</div>
@endforeach
</div>
<!--end job post-->
@endsection