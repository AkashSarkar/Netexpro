<!--job hire post-->



<div class="col-md-7 col-sm-7 col-lg-7 show_home_post" id="h_post">

<!--Search 
{{-- 
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
--}} -->

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
              <?php $checkApplicant=0?>
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
              @if($checkApplicant==0)
                    <form method="post" action="{{ route('applicants.store') }}">
                                {{ csrf_field() }}
                            <input type="hidden" name="jobpost_id" method="PUT" value="{{$jobpost->jobpost_id}}">
                            <button type="" class="btn btn-primary pull-right btn-sm">Apply now</button>
                    </form>
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
                <i class="glyphicon glyphicon-thumbs-up"></i> Like</a>
            </li>
            <li>
              <a href="#">
                <i class="glyphicon glyphicon-comment"></i> Comment</a>
            </li>
            <li>
              <a href="#">
                <i class="glyphicon glyphicon-share-alt"></i> Share</a>
            </li>
          </ul>
        </div>

      </div>
</section>

<!--Comment Section -->
<section >

    <!--Create Comment start -->
            <div class="comment-form">
              <div class="comment">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="32" height="32" alt="...">
                    </a>
                  </div>

                  <div class="media-body">
                    <form method="POST" action="{{ route('comment.store') }}">
                      {{ csrf_field() }}

                      <input type="hidden" name="commentable_type" value="App\Jobpost">
                      <input type="hidden" name="commentable_id" value="{{ $jobpost->jobpost_id }}">

                      <div class="form-group">
                        <input class="form-control" style="border-radius: 20px;" type="text" name="body" placeholder="Your comments" />
                         <button type="submit" style="float: right; margin: -34px 0px 0 0; height: 33px; border-top-right-radius: 15px; border-bottom-right-radius: 15px;">Comment</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--Create Comment end -->

     <h3 class="comment-title">Comments</h3>

            <!--Comment show start -->
            @foreach($jobComment as $comment) @if( $jobpost->jobpost_id==$comment->commentable_id)
           <div class="comment-wrapper">
           
            <div class="comments-list">
              <ul class="comments-holder-ul">
                <li class="comment-holder" id="_1">
                  <div class="user-img">
                     <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}" width="32" height="32" alt="...">
                  </div>

                  <div class="comment-body">
                      <h4 class="username-field">
                      {{ $comment->firstname }}</h4>
                      <span class="anchor-time">{{$comment->created_at}}</span>
                     
                      <div class="comment-text">
                          {{$comment->body}}
                      </div>
                      <a href="#" class="anchor-time" style="margin-left:40px ;">Reply</a>
                  </div>

                 {{-- <div class="comment-buttons-holder">
                    <ul>
                      <li class="delete-btn">X</li>
                    </ul>
                  </div> --}} 
                </li>
              </ul>

            </div>


            </div>
            
            @endif @endforeach
            <!--Comment show end-->

        
    </section>


  </div>
</div>
@endforeach
</div>
<!--end job post-->















