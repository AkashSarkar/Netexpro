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
                <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $jobpost['p_pic'] }}" width="40" height="40"
                  alt="...">
              </a>
            </div>
            <div class="media-body">
              @if($jobpost['user_id'] == Auth::user()->id)
              <div class="dropdown ">
                <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
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

                    <form id="delete-form2" action="{{ route('jobpost.destroy', $jobpost['jobpost_id']) }}" method="POST" style="display:none;">
                      <input type="hidden" name="_method" method="PUT" value="delete"> {{ csrf_field() }}
                    </form>

                  </li>
                </ul>
              </div>
              @endif

              <a href="#" class="anchor-username">
                <h4 class="media-heading"> {{$jobpost['firstname']}}</h4>
              </a>

              <a href="#" class="anchor-time">{{ $jobpost['created_at'] }}</a>
            </div>
          </div>
        </div>

      </div>
    </section>
    <section class="post-body well well-lg" style="background-color: #CFD8DC; border-radius: 4px;">
      <h4 style="font-weight:bold;">******Hiring post******</h4>
      <p>
        <li>Position :
          <strong>{{ $jobpost['position'] }}</strong>
        </li>
      </p>
      <p>
        <li>Profession :
          <strong>{{ $jobpost['profession'] }}</strong>
        </li>
      </p>
      <p>
        <li>No. of Vacancy :
          <strong>{{ $jobpost['vacancy_number'] }}</strong>
        </li>
      </p>
      <p>
        <li>Job Circular:
          <strong>{{ $jobpost['circular'] }}</strong>
        </li>
      </p>
      <p>
        <li>Company Details:
          <strong>{{ $jobpost['company_details'] }}</strong>
        </li>
      </p>
      <p>
        <li>Job Responsibilities:
          <strong>{{ $jobpost['job_details'] }}</strong>
        </li>
      </p>
      <p>
        <li>Job Location :
          <strong>{{ $jobpost['location'] }}</strong>
        </li>
      </p>

    </section>
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
      <div class="row">
        <div class="post-footer-comment-wrapper">
          <div class="col-md-12 col-sm-12 col-lg-12">

            <!--Comment show start -->
            @foreach($jobComment as $comment) @if( $jobpost['jobpost_id']==$comment->commentable_id)
            <div class="well well-sm">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}" width="32" height="32" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="anchor-username">
                    <h4 class="media-heading">{{ $comment->firstname }}</h4>
                  </a>
                  <a href="#" class="anchor-time">{{$comment->created_at}}</a>
                </div>
                <div class="commentText">
                  <p class="">{{$comment->body}}</p>
                </div>
              </div>
            </div>
            @endif @endforeach
            <!--Comment show end-->

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
                      <input type="hidden" name="commentable_id" value="{{ $jobpost['jobpost_id'] }}">

                      <div class="form-group">
                        <input class="form-control" type="text" name="body" placeholder="Your comments" />
                      </div>
                      <div class="form-group">
                        <button class="btn btn-default">Add</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--Create Comment end -->

          </div>
        </div>
      </div>

    </section>


  </div>
</div>
@endforeach
<!--end job post-->