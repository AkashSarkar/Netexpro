
<!--user available interface-->
<div class="col-md-7 col-sm-7 col-lg-7 show_home_post" id="h_post">
@foreach($useravailablepost as $useravailablepost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$useravailablepost->p_pic}}" width="40" height="40"
                        alt="...">
                    </a>
                  </div>
                  <div class="media-body">

                    @if($useravailablepost->user_id == Auth::user()->id)
                    <div class="dropdown ">
                    <button class="pull-right dropdown-toggle   btn btn-link" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                      <ul class="dropdown-menu pull-right">
                        <li>

                          <a href="#" onclick=" var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form1').submit();
                              }"> Delete </a>

                          <form id="delete-form1" action="{{ route('availableforjob.destroy', $useravailablepost->useravailablepost_id) }}" method="POST"
                            style="display:none;">
                            <input type="hidden" name="_method" method="PUT" value="delete"> {{ csrf_field() }}
                          </form>

                        </li>
                      </ul>
                    </div>
                    @endif

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$useravailablepost->firstname}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $useravailablepost->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-lg" style="background-color: #D7CCC8; border-radius: 4px;">
            <h4 style="font-weight:bold;">******job seeking post******</h4>
            <p>
              <li>Position :
                <strong>{{ $useravailablepost->position }}</strong>
              </li>
            </p>
            <p>
              <li>Profession :
                <strong>{{ $useravailablepost->profession }}</strong>
              </li>
            </p>
            <p>
              <li>Preferred Job Location :
                <strong>{{ $useravailablepost->location }}</strong>
              </li>
            </p>
            <p>
              <li>Highlights(Any specified course/skills) :
                <strong>{{ $useravailablepost->highlight }}</strong>
              </li>
            </p>
            <li>
              <a target="_blank" href="/uploads/attachment/{{$useravailablepost->CV}}">Preview CV ..</a>
            </li>
         

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

                             <input type="hidden" name="commentable_type" value="App\AvailableForJob">
                                   <input type="hidden" name="commentable_id" value="{{ $useravailablepost->useravailablepost_id }}">

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
             @foreach($useravailableComment as $comment)
                         @if( $useravailablepost->useravailablepost_id==$comment->commentable_id)
                 <div class="comment-wrapper">
                 
                  <div class="comments-list">
                    <ul class="comments-holder-ul">
                      <li class="comment-holder" id="_1">
                        <div class="user-img">
                           <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user->p_pic}}" width="32" height="32" alt="...">
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
<!--end available interface-->
