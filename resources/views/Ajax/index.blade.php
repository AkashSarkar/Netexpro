<?php $last_key =count($post); $post_count=0;?>
@if($post!=null) @foreach($post as $userpost)

<!--variable for count array-->
<?php $post_count=$post_count+1;?>
<div class="panel panel-default">
  <div class="panel-body">
    <section class="post-heading">
      <div class="row">
        <div class="col-md-12">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$userpost->p_pic}}" width="40" height="40" alt="...">
              </a>
            </div>
            <div class="media-body">
              @if($userpost->user_id == Auth::user()->id)
              <div class="dropdown ">
              <button class="pull-right dropdown-toggle   btn btn-lg btn-link" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i>
              </button>

                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="#" onclick="
                             var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form').submit();
                              }">Delete</a>

                    <form id="delete-form" action="{{ route('post.destroy', $userpost->post_id) }}" method="POST" style="display:none;">
                      <input type="hidden" name="_method" method="PUT" value="delete"> {{ csrf_field() }}
                    </form>

                  </li>
                </ul>

              </div>
              @endif

              <a href="#" class="anchor-username">
                <h4 class="media-heading"> {{$userpost->firstname}}</h4>
              </a>

              <a href="#" class="anchor-time">{{ $userpost->created_at }}</a>
            </div>
          </div>
        </div>

      </div>
    </section>
    
    <section class="post-body well well-sm " style="background-color: #EEEEEE; border-radius: 4px;  ">
      @if($post_count == $last_key)
        <span id="ajax_last_post_id{{$page}}" style="display:none;">{{ $userpost->row_no }}</span>
      @endif
      <div class=" row">
        <div class="col-md-12">
          <div class="well well-sm">
            <p style="font-size:18px;font-weight:400;">{{ $userpost->description }} </p>
          </div>
        </div>
      </div>
      <!--project show-->
      @if($userpost->post_type=="project")
      <h4>URL :</h4>

      <div class=" row">
        <div class="col-md-12">
          <div class="well well-md">
            <a href="{{ $userpost->url }} "> {{ $userpost->url }}</a>
          </div>
        </div>
      </div>
      @endif
      <!-- end project show-->

      <!--image show-->
      <?php $i=0; ?>
      <?php $a=array();?> @foreach($images as $imgpost) @if( $userpost->post_id==$imgpost->post_id)
      <h4>Project Images : </h4>
      <div class=" row">
        <div class="col-md-12 col-lg-12">
          <div class="well well-sm">


            @foreach($images as $imagepost) @if( $userpost->post_id==$imagepost->post_id)


            <?php $i++; ?>

            <img class="fb-image-lg" src="/uploads/postimages/{{$imagepost->post_image}}" alt="Project image " style="height:100px;width:20%;"
              data-toggle="modal" data-target="#gallery_modal<?php echo $imagepost->post_id ; echo $i;?>" />




            <!--Modal Gallery-->
            <div class="modal fade" id="gallery_modal<?php echo $imagepost->post_id ; echo $i;?>" role="dialog">
              <div class="modal img-modal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-8 modal-image">
                          <!--A variable for Gallery modal as flag-->
                          <?php $f=0; ?> @foreach($images as $gallery) @if( $gallery->post_id == $imagepost->post_id ) @if( $gallery->post_image==$imagepost->post_image)
                          <img class="img-responsive" src="/uploads/postimages/{{$gallery->post_image}}"> @else
                          <img class="img-responsive hidden" src="/uploads/postimages/{{$gallery->post_image}}"> @endif @endif @endforeach






                          <a href="" class="img-modal-btn left">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                          </a>
                          <a href="" class="img-modal-btn right">
                            <i class="glyphicon glyphicon-chevron-right"></i>
                          </a>
                        </div>
                        <div class="col-md-4 modal-meta">
                          <div class="modal-meta-top">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="img-poster clearfix">
                              <a href="">
                                <img class="img-circle" src="/uploads/profile/{{$userpost->p_pic}}" />
                              </a>
                              <strong>
                                <a href=""> {{$userpost->firstname}} {{$userpost->lastname}}</a>
                              </strong>
                              <span>{{$userpost->created_at}}</span>
                            </div>

                            <ul class="img-comment-list">
                              <li>
                                <div class="comment-img">
                                  <img src="http://lorempixel.com/50/50/people/6">
                                </div>
                                <div class="comment-text">
                                  <strong>
                                    <a href="">Jane Doe</a>
                                  </strong>
                                  <p>this is here</p>
                                  <?php echo $imagepost->post_id;?>
                                  <span class="date sub-text">on December 5th, 2016</span>
                                </div>
                              </li>
                              <li>
                                <div class="comment-img">
                                  <img src="http://lorempixel.com/50/50/people/7">
                                </div>
                                <div class="comment-text">
                                  <strong>
                                    <a href="">Jane Doe</a>
                                  </strong>
                                  <p>Hello this is a test comment and this comment is particularly very long and it goes on
                                    and on and on.</p>
                                  {{$i}}
                                  <span>on December 5th, 2016</span>
                                </div>
                              </li>
                              <li>
                                <div class="comment-img">
                                  <img src="http://lorempixel.com/50/50/people/9">
                                </div>
                                <div class="comment-text">
                                  <strong>
                                    <a href="">Jane Doe</a>
                                  </strong>
                                  <p class="">Hello this is a test comment.</p>
                                  <span class="date sub-text">on December 5th, 2016</span>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="modal-meta-bottom">
                            <input type="text" class="form-control" placeholder="Leave a commment.." />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


            </div>
            <!--End modal gallery-->




            @endif @endforeach
          </div>
        </div>
      </div>
      @break; @endif @endforeach
      <!-- end image show-->
    </section>
    
    @include('template.rate_info_modal')
     <!--if user first rated in comment-->
     <?php $check=0 ;?>
    @foreach($user_rate_info as $rate_info) 
        @if($rate_info->post_id==$userpost->post_id)
          <?php $check=$check+1; ?>
          @break;
        @endif
    @endforeach
    @if( $check==0)
    <a  style="font-weight:600; color:#365899" id="after_user_rate{{$userpost->post_id}}"></a>
    
    @endif
    <!--end if user first rated comment-->
    <hr>
   
    <section class="post-footer">
      <div class="row">
        <div class="col-md-12">
         
          <ul class="list-unstyled">
            <li>
              <!-- Shows Rate text and icon if post type is Project-->
              @if($userpost->post_type=="project")
              <!--<a href="#" data-toggle="modal" data-target="#starModal"><i class="glyphicon glyphicon-star"></i>Rate</a>-->
              <?php $rate=0;?> @if($isLiked) @foreach($isLiked as $like) @if($like['user_id']== Auth::user()->id && $userpost->post_id==$like['post_id'])
              <a>
                <i class="active fa fa-star" aria-hidden="true"></i>
              </a>
              <a>Rated</a>
              <span> {{$userpost->ratting}}</span>

              <?php $rate+=1;?> @break; @endif @endforeach @endif @if($rate==0)
              <div id="hoverDisable{{$userpost->post_id}}" class="HeaderBarThreshold">

                <div class="star-rating" style="position:absolute;margin-top:-40px; margin-left:-20px;">

                  <label for="star-10" onclick="rate({{$userpost->post_id}},10)" title="10 stars" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-9" title="9 stars" onclick="rate({{$userpost->post_id}},9)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-8" title="8 stars" onclick="rate({{$userpost->post_id}},8)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-7" title="7 stars" onclick="rate({{$userpost->post_id}},7)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-6" title="6 star" onclick="rate({{$userpost->post_id}},6)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-5" title="5 stars" onclick="rate({{$userpost->post_id}},5)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-4" title="4 stars" onclick="rate({{$userpost->post_id}},4)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-3" title="3 stars" onclick="rate({{$userpost->post_id}},3)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>

                  <label for="star-2" title="2 stars" onclick="rate({{$userpost->post_id}},2)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>


                  <label for="star-1" title="1 star" onclick="rate({{$userpost->post_id}},1)" id="star" style="visibility:hidden;">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                  </label>


                </div>
                <a>
                  <i class="active fa fa-star" aria-hidden="true"></i>
                </a>
                <a id="after_rate{{$userpost->post_id}}" ontouchstart=""> Rate</a>
                <span id="{{$userpost->post_id}}">{{$userpost->ratting}}</span>

              </div>
              @endif @else
              <a href="#">
                <i class="glyphicon glyphicon-thumbs-up"></i> Like</a>
              @endif
              <!--End Shows Rate text and icon if post type is Project-->
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
        
      <!--comment show-->
      @include('template.Comment_Interface')
      <!--comment end-->
  


  </div>
</div>
@endforeach @endif


 <script type="text/javascript">
     
      function reply(id)
      {
        var str1="reply";
        var str2=id;
        var res = str1.concat(str2);
        var reply = document.getElementById(res);
        reply.style.display = "block";
      }

      
   </script>