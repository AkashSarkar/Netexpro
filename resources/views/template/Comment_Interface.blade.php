
        <section>
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
                              <input type="hidden" name="commentable_type" value="App\Post">
                              <input type="hidden" name="commentable_id" value="{{ $userpost->post_id }}">

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
           @foreach($userComment as $comment) 
              @if( $userpost->post_id==$comment->commentable_id)
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
                  
              @endif
            @endforeach
          <!--Comment show end-->


         </section> 
   

