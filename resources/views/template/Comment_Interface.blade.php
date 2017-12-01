<section class="well well-sm" >
     <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">

            <!--Comment show start -->
             @foreach($userComment as $comment) 

                  @if( $userpost->post_id==$comment->commentable_id)
                 
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

                             <input type="hidden" name="commentable_type" value="App\Post">
                                  <input type="hidden" name="commentable_id" value="{{ $userpost->post_id }}">

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

