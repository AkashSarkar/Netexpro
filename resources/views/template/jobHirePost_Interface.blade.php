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
</section>






<!--Comment Section -->
<section class="well well-sm">
  <div class="row">
       
          <div class="col-md-12 col-sm-12 col-lg-12">
            

   {{--  <div class="comment-wrap" >
        <div class="media-left">
                  <a href="#">
                    <img class="media-object photo-profile img-circle" src="" width="32" height="32" alt="...">
                  </a>
                </div>
        <div class="comment-block">
            <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam reprehenderit quasi
                sapiente modi tempora at perspiciatis mollitia, dolores voluptate. Cumque, corrupti?</p>
            <div class="bottom-comment">
                <div class="comment-date">Aug 24, 2014 @ 2:35 PM</div>
                <ul class="comment-actions">
                    <li class="reply">Reply</li>
                </ul>
            </div>
        </div>
    </div> --}}



            <!--Comment show start -->
            @foreach($jobComment as $comment) @if( $jobpost['jobpost_id']==$comment->commentable_id)
           
              <div class="media" >
                <div class="media-left">
                  <a href="#">
                    <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}" width="32" height="32" alt="...">
                  </a>
                </div>
                </div>

                <div style=" padding: 7px; border-radius: 5px; margin-top: -40px; margin-left: 40px; margin-bottom: 10px;">
                <div class="media-body">
                  <a href="#" class="anchor-username">
                    <h4 class="media-heading">{{ $comment->firstname }}</h4>
                  </a>
                  <a href="#" class="anchor-time">{{$comment->created_at}}</a>
                </div>
                <div class="commentText">
                  <p class="">{{$comment->body}}</p>
                </div>
                <a href="#" class="anchor-time" style="margin-top: -20px;">Reply</a>
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
                        <input class="form-control" style="border-radius: 20px;" type="text" name="body" placeholder="Your comments" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--Create Comment end -->

          </div>
       
      </div>

    </section>


  </div>
</div>
@endforeach

<!--end job post-->