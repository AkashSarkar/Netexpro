<!--user available interface-->
@foreach($useravailablepost as $useravailablepost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$useravailablepost['p_pic']}}" width="40" height="40"
                        alt="...">
                    </a>
                  </div>
                  <div class="media-body">

                    @if($useravailablepost['user_id'] == Auth::user()->id)
                    <div class="dropdown ">
                      <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                      </button>
                      <ul class="dropdown-menu pull-right">
                        <li>

                          <a href="#" onclick=" var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form1').submit();
                              }"> Delete </a>

                          <form id="delete-form1" action="{{ route('availableforjob.destroy', $useravailablepost['useravailablepost_id']) }}" method="POST"
                            style="display:none;">
                            <input type="hidden" name="_method" method="PUT" value="delete"> {{ csrf_field() }}
                          </form>

                        </li>
                      </ul>
                    </div>
                    @endif

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$useravailablepost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $useravailablepost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-lg" style="background-color: #D7CCC8; border-radius: 4px;">
            <h4 style="font-weight:bold;">******job seeking post******</h4>
            <p>
              <li>Position :
                <strong>{{ $useravailablepost['position'] }}</strong>
              </li>
            </p>
            <p>
              <li>Profession :
                <strong>{{ $useravailablepost['profession'] }}</strong>
              </li>
            </p>
            <p>
              <li>Preferred Job Location :
                <strong>{{ $useravailablepost['location'] }}</strong>
              </li>
            </p>
            <p>
              <li>Highlights(Any specified course/skills) :
                <strong>{{ $useravailablepost['highlight'] }}</strong>
              </li>
            </p>
            <li>
              <a target="_blank" href="/uploads/attachment/{{$useravailablepost['CV']}}">Download CV from here..</a>
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
            
            <!--Comment section -->
            <section class="well well-sm">
            <div class="row">
             
                <div class="col-md-12 col-sm-12 col-lg-12">

                  <!--Comment show start -->
                  @foreach($useravailableComment as $comment)
                   @if( $useravailablepost['useravailablepost_id']==$comment->commentable_id)

                    <div class="media" >

                        <div class="media-left">
                          <a href="#">
                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}" width="32" height="32" alt="...">
                          </a>
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
                     </div>
                     
                    @endif 
                  @endforeach
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

                             <input type="hidden" name="commentable_type" value="App\AvailableForJob">
                             <input type="hidden" name="commentable_id" value="{{ $useravailablepost['useravailablepost_id'] }}">

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
<!--end available interface-->