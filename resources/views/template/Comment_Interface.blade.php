
        <section>
             <!--Create Comment start -->
                  <div class="comment-form" >
                    <div class="comment">
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="32" height="32" alt="...">
                          </a>
       
                        </div>

                        <div class="media-body">
                         
                              <input type="hidden" id="post_type" name="commentable_type" value="App\Post">
                              <input type="hidden" id="post_id" name="commentable_id" value="{{ $userpost->post_id }}">

                              <div class="form-group">
                                <input class="form-control" id="commentPost" style="border-radius: 20px;" type="text" 
                                  onchange="comment(this.value)"  name="body" placeholder="Your comments"/>
                                
                              </div>
                              
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Create Comment end -->

               <h3 class="comment-title">Comments</h3>

                  <!--Comment show start -->
                <div id="commentShow">

                </div>
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
                                <p id="{{$userpost->post_id}}">{{$comment->id}}</p>
                            </div>

                            <!-- Reply -->
                            <div>
                             <a class="anchor-time" style="margin-left:40px ;"  onclick="reply({{$comment->id}})">Reply</a>
                            </div>
                           

                               <!--Create Comment reply start -->
                                <div class="comment-form" id="reply{{$comment->id}}"  style="display: none;">
                                  <div class="comment">
                                    <div class="media">
                                      <div class="media-left">
                                        <a href="#">
                                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="32" height="32" alt="...">
                                        </a>
                     
                                      </div>

                                      <div class="media-body">
                                        <form method="POST" action="{{ route('reply.store') }}">
                                          {{ csrf_field() }}
                                            <input type="hidden" name="commentable_type" value="App\Post">
                                            <input type="hidden" name="commentable_id" value="{{ $userpost->post_id }}">
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">


                                            <div class="form-group">
                                              <input class="form-control" style="border-radius: 20px;" type="text" id="commentBody"  name="body" placeholder="Your comments" />
                                              <button type="submit" style="float: right; margin: -34px 0px 0 0; height: 33px; border-top-right-radius: 15px; 
                                              border-bottom-right-radius: 15px;"  >Comment</button>
                                            </div>
                                            
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--Create Comment reply end -->
                           
                           <!--Comment reply show start -->

                              @foreach($userCommentReply as $reply)
                              @if( $userpost->post_id==$reply->commentable_id && $comment->id==$reply->comment_id)
                                 
                                  <div class="comment-wrapper" style="margin-left: 30px;">
                                   <hr>
                                      <div class="comments-list">
                                          <ul class="comments-holder-ul">
                                              <li class="comment-holder" id="_1">
                                                  <div class="user-img">
                                                    <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$reply->p_pic}}" width="32" height="32" alt="...">
                                                  </div>

                                                  <div class="comment-body">
                                                      <h4 class="username-field">
                                                      {{ $reply->firstname }}</h4>
                                                      <span class="anchor-time">{{$reply->created_at}}</span>
                                                    
                                                      <div class="comment-text">
                                                          {{$reply->body}} 
                                                      </div>
                                                  </div>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              @endif
                              @endforeach
                           
                           <!--Comment reoly show end -->


                        </div>
                      </li>
                    </ul>

                  </div>
             </div>
                  
              @endif
            @endforeach
          <!--Comment show end-->


         </section> 
   
  <script type="text/javascript">
    function comment(commentBody){
      var type=$('#post_type').val();
      var post_id=$('#post_id').val();
      var last_comment_id=$("#"+post_id).text();
      
      var data={
        'body':commentBody,
        'type':type,
        'post_id':post_id,
        'last_comment_id':last_comment_id
      };
      var html='';
      //console.log(data);
      if(commentBody!=" "){
        axios.post('/comment/postComment',data).then((response)=> 
                
                  console.log(response),
                  $("#commentPost").val("")
                )
                .catch((error)=>
                    console.log(error)
                );
               
               
        axios.post('/comment/getComment',data).then((response)=> 
               
                
                $('#commentShow').append(response.data[0])
              )
              .catch((error)=>
                  console.log(error)
              );
      }
      
      //

       
     
      
    };
  </script>

