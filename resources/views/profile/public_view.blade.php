@extends('layouts.app') 

@section('page-title') {{ $user->firstname }} {{ $user->lastname }} @endsection 

@section('content')
<?php
$educations=array(
    "United International University",
    "Ahsanullah University of Science and technology",
    "BUET",
    "DU",
    "NSU"
);

$desires = array(
    "CSE",
    "EEE",
    "BBA",
    "MBA",
    "MSCSE"
);

$professions = array(
    "CSE",
    "EEE",
    "BBA",
    "MBA",
    "MSCSE"
);
$industries = array(
    "Software",
    "IT",
    "Hardware"
);
?>

<div style="margin-top: 80px;">
  <img align="left" class="fb-image-profile thumbnail" src="/uploads/profile/{{ $user->p_pic }}" alt="Profile image example"
  />
  <div class="fb-profile-text" style="width: auto;">
    <h1 style=" font: italic bold 30px/30px Georgia, serif;">{{ $user->firstname }} {{ $user->lastname }} </h1>
    
    <p>{{ $interest->profession }}</p>
    
    <p>Projects done by {{ $user->firstname }} :
      <strong> {{ $projects }} </strong>
    </p>
    
    <p>Average Profile Rating:
        <strong>{{$total_avg_rating}} </strong>
    </p>

  </div>
</div>


 <!--Hire button will be here -->
  <div class="row" style="padding-right: 20px;">
    <div class="col-md-4 col-sm-4 col-lg-4 pull-right">
      @if($is_hired!=null)
        <button type="submit" class="btn btn-info pull-right disabled " style="margin-top: -40px;cursor:pointer;">Invitation Sent</button>
      @else
       <form method="post"  action="{{ url('/hire_employee')}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="employer" value="{{$employer_id}}">
        <input type="hidden" name="employee" value="{{$employee_id}}">
        <input type="hidden" name="hire_post_id" value="{{$jobpost_id}}">
        <button type="submit" class="btn btn-primary pull-right" style="margin-top: -40px;">Hire</button>
    </form>
    @endif 

    </div>
  </div>



</div>

<div class="container">
  <div class="row">
    <div class="column side">

     <!--Personal information start-->
      <section style="background-color: white; border-width:5px;  
                      border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">

        </br>
        <p>Education:
          <strong> {{ $user->education }} </strong>
        </p>
        <p>Email:
          <strong> {{ $user->email }} </strong>
        </p>
        <p>Phone:
          <strong> {{ $user->phone_no }} </strong>
        </p>
        <p>Sex:
          <strong> {{ $user->gender }} </strong>
        </p>
        <p>Birth date:
          <strong> {{ $user->dob }} </strong>
        </p>
        <p>Location:
          <strong> {{ $user->location }} </strong>
        </p>
       
       <!--Personal information end-->
     </section>

      </br>

     <section style="background-color: white; border-width:5px;  
                      border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
          <!--Professional information start -->

          
         
          <p>Profession:
            <strong> {{ $interest->profession }} </strong>
          </p>
          <p>Industry:
            <strong> {{ $interest->industry }} </strong>
          </p>
          </br>
       </section>
       <!--Professional information end -->
        
        </br>

        <!--Interest modal start here-->
 
        <section style="background-color: white; border-width:5px;  
             border-style:outset; padding: 10px; box-shadow: 10px 10px 5px #888888;">
        <!--Interest start -->

        </br>
           <p>Interest:
             @foreach($choices as $choice)
             <ol><strong>{{ $choice->profession }}</strong></ol>
             @endforeach
           </p>
           
           <p>CV:
             @foreach($useravailablepost as $useravailableposts)
               <a target="_blank" href="/uploads/attachment/{{$useravailableposts->CV}}">View CV here..</a>
               @break;
           @endforeach
           </p>

           
          
          

        </br>

      </section>
      <!--Interest modal end here-->

      
    </div>

    <div class="column middle">
      
      <div class="col-md-offset-4" style="font-style: italic; opacity: .6;">
      @if(count($posts)==null)
        <h3>"No project to show"</h3>
      @endif
      </div>
      <!-- Post show start -->
      @if($posts!=null) 
        
      @foreach($posts as $userpost)
         @if($userpost->post_type=="project")

       
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $user->p_pic }}" width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                  

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$user->firstname}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $user->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-sm " style="background-color: #EEEEEE; border-radius: 4px;  ">
            <!--project show-->
         
            <div class=" row">
              <div class="col-md-12">
                <div class="well well-sm">
                  <p style="font-size:18px;font-weight:400;">{{ $userpost->description }} </p>
                </div>
              </div>
            </div>
            
          
            <h4>URL :</h4>
            <div class=" row">
              <div class="col-md-12">
                <div class="well well-md">
                  <a href="{{ $userpost->url }} "> {{ $userpost->url }}</a>
                </div>
              </div>
            </div>
            
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
                                      <img class="img-circle" src="/uploads/profile/{{$user->p_pic}}" />
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
                                        <p>Hello this is a test comment and this comment is particularly very long and it goes
                                          on and on and on.</p>
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
                    <?php $rate=0;?> @if($isLiked) @foreach($isLiked as $like) 
                    @if($like['user_id']== Auth::user()->id && $userpost->post_id==$like['post_id'])
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
                    @endif 
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
         <section>
             <!--Create Comment start -->
                  <div class="comment-form">
                    <div class="comment">
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user->p_pic}}" width="32" height="32" alt="...">
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
                            
                            <!--Reply -->
                            <div>
                             <a class="anchor-time" style="margin-left:40px ;"  onclick="reply({{$comment->id}})">Reply</a>
                            </div>

                             <!--Create Comment reply start -->
                                <div class="comment-form" id="reply{{$comment->id}}"  style="display: none;">
                                  <div class="comment">
                                    <div class="media">
                                      <div class="media-left">
                                        <a href="#">
                                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user->p_pic}}" width="32" height="32" alt="...">
                                        </a>
                     
                                      </div>

                                      <div class="media-body">
                                        <form method="POST" action="{{ route('reply.store') }}">
                                          {{ csrf_field() }}
                                            <input type="hidden" name="commentable_type" value="App\Post">
                                            <input type="hidden" name="commentable_id" value="{{ $userpost->post_id }}">
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">


                                            <div class="form-group">
                                              <input class="form-control" style="border-radius: 20px;" type="text" name="body" placeholder="Your comments" />
                                               <button type="submit" style="float: right; margin: -34px 0px 0 0; height: 33px; border-top-right-radius: 15px; border-bottom-right-radius: 15px;">Comment</button>
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
                           
                           {{--  <a href="#" class="anchor-time" style="margin-left:40px ;">Reply</a>--}}
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
   
          <!--comment end-->

       </div>
      </div>
      
      @endif
      @endforeach @endif

      <!--post show end -->
</div>

  </div>
</div>

<script type="text/javascript">
  
  //image show while select

  $(document).ready(function () {
    $('input[type="file"]').change(function (e) {
      for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];
        var reader = new FileReader();
        reader.onload = function (e) {

          $('<img />', {
            "src": e.target.result,
            "width": "15%",
            "height": "100px",
            "style": "padding:2px; width:20% ; height:100px;",
          }).appendTo(image_preview);
        }

        reader.readAsDataURL(this.files[i]);
      }
    });
  });
  //end image show while select

  //shows projects fields
  $(document).ready(function () {
    $("#show_porjectFields").hide();
    $('#url').removeAttr('required');
    $("input[name='post_type']").click(function () {
      var post_type = $("input[name='post_type']:checked").val();
      if (post_type == "project") {
        $('#url').attr('required', true);
        $("#show_porjectFields").show();

      } else {

        $('#url').removeAttr('required');
        $("#show_porjectFields").hide();

      }

    });

    //select all check box

    $("#btn_text").html("All Connection  <span class='caret'></span>");
    $("#selectall").click(function () {
      $("#btn_text").html("All Connection  <span class='caret'></span>");
      if (this.checked) {

        $('.checkItem').each(function () {
          this.checked = true;


        })
      } else {
        $("#btn_text").html("Select Connection <span class='caret'></span>");
        $('.checkItem').each(function () {
          this.checked = false;
        })
      }
    });

    $(".checkItem").click(function () {
      $('#selectall').removeAttr('checked');
      $('.checkItem').removeAttr('checked');
      var checkedItems = $('.checkItem:checked');
      if (checkedItems.length > 0) {
        var res = "";
        checkedItems.each(function () {
          res += $(this).val() + " ";
        });
        $("#btn_text").html(res + "<span class='caret'></span>");
      } else {
        $("#btn_text").html(checkedItem.val() + "<span class='caret'></span>");
      }


    });

    //end select all check box
  });


  //ajax post 
  function rate(post_id, rating) {

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: "<?php echo url('/rating') ?>",
      data: "rating=" + rating + "&post_id=" + post_id,
      async: false,
      success: function (data) {

        console.log("inserted");

      }
    });

    //get avg rating
    $.ajax({
      url: "{{url('/rating/getdata')}}",
      type: 'GET',
      data: {
        'post_id': post_id
      },
      success: function (response) {
        console.log(response); 
        $("#"+post_id).html(response);
        $("#hoverDisable"+post_id).removeClass("HeaderBarThreshold");

        $("#after_rate"+post_id).html("Rated ");
        $("#after_user_rate"+post_id).html('<i class="active fa fa-star" aria-hidden="true" style="color:#F39C12;font-weight:400;"></i>  You rated this project ');
        $("#after_user_rate_modal"+post_id).html('You , ');
      }
    });
    //end avg rating

  }


  //handles visivility validation
  $(function () {

    var requiredCheckboxes = $(':checkbox[required]');
    requiredCheckboxes.change(function () {

      if (requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
      } else {
        requiredCheckboxes.attr('required', 'required');

      }
    });
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 <script>
 $(document).ready(function(){
   $('#desire').select2({
       placeholder:"selectinterest",
       tags:true,
   });
 });

 function reply(id)
      {
        var str1="reply";
        var str2=id;
        var res = str1.concat(str2);
        var reply = document.getElementById(res);
        reply.style.display = "block";
      }

 </script>

@endsection