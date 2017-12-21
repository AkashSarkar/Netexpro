<!--job hire post-->
@foreach($jobpost as $jobpost)
<div class="panel panel-default">
  <div class="panel-body">


    <section class="post-heading">
      <div class="row">
        <div class="col-md-12">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $jobpost->p_pic}}" width="40" height="40"
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
              <!--Getting Applicant Value-->
              <?php $checkApplicant=0;$valid_candidate=0;$id=$jobpost->jobpost_id ;?>
              @if($jobpost->user_id != Auth::user()->id )
              @foreach($applicants as $applicant)
                @if($applicant->jobpost_id == $jobpost->jobpost_id)
                    @if($applicant->user_id ==  Auth::user()->id )
                    <?php $checkApplicant=$checkApplicant+1;?>
                    <button type="" class="btn btn-success pull-right btn-sm">Applied</button>
                    @break;
                    @endif
                @endif
              @endforeach
              <!--Active Apply now  for Qualified Candidate-->
              @foreach($qualified_candidate as $qualified_candidates)
                  @if($qualified_candidates->jobpost_id == $jobpost->jobpost_id)
                     <?php $valid_candidate=$valid_candidate+1;?>
                     @break;
                  @endif
              @endforeach
              <!--End Active Apply now-->
              @if($checkApplicant == 0 && $valid_candidate > 0)
                    <form method="post" action="{{ route('applicants.store') }}">
                                {{ csrf_field() }}
                            <input type="hidden" name="jobpost_id" method="PUT" value="{{$jobpost->jobpost_id}}">
                            <button type="" class="btn btn-primary pull-right btn-sm">Apply now</button>
                    </form>
              @elseif($checkApplicant == 0  && $valid_candidate == 0)
              <button type="button" data-toggle="modal" data-target="#applicationForm<?php echo $jobpost->jobpost_id?>" class="btn btn-primary pull-right btn-sm">Apply for job</button>
 
                <!--Application Form-->
                 
                <div class="modal fade" id="applicationForm<?php echo $jobpost->jobpost_id?>" role="dialog">
    <div class="modal-dialog">
    
                <!-- Modal content-->
                  
                  @include('template._applicationForm')
                 <!--End Application form-->
              @endif
              @endif
              <!--End of getting Applicant Value-->
  
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

    <hr>
    <!--Applicants List-->
    <section>
      @if($jobpost->user_id == Auth::user()->id )
      <h4>Applicants</h4>
        @include('template._applicantsModal')
      @endif      
    </section>
    <!--End Applicants list-->
  
 

  </div>
</div>
@endforeach

<!--end job post-->















