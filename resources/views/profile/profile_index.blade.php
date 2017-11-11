@extends('layouts.app') @section('content')


<div class="fb-profile">
  <div>
    <img align="left" class="fb-image-lg" src="/uploads/cover/{{ $user->cover_pic }}" alt="Profile image example" style="height:400px;width:100%;"
    />
    <div class="pull-right" style="margin-top:-60px;opacity: 50;">
      <form id="target" enctype="multipart/form-data" action="{{ route('profile.store') }}" method="POST">
        {{csrf_field()}}
        <input type="file" name="cover" id="my_file" onchange="form.submit()" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="button" class="btn btn-default btn-sm pull-right" value="Change Cover Image" onclick="update_cover()" style="opacity:0.5;margin:5px;">
      </form>
    </div>
  </div>
  <!--End of Cover image-->
  <img align="left" class="fb-image-profile thumbnail" src="/uploads/profile/{{ $user->p_pic }}" alt="Profile image example"
  />
  <div class="fb-profile-text">
    <h1>{{ $user->firstname }} </h1>
    <p>{{ $interest->profession }}</p>
  </div>

  <div class="row" style="padding-top: 10px;">
    <div class="col-md-4 col-sm-4 col-lg-4 pull-right">

      <div class="panel-heading">
        <div class="btn-group btn-group-md">
          <button type="button" class="btn btn-primary">Update Info</button>
          <button type="button" class="btn btn-link">|</button>
          <button type="button" class="btn btn-primary">View activity log</button>

        </div>
      </div>

    </div>
    <!--profile pic change start-->
    <input id="Updateprofile" type="button" class="btn btn-default btn-sm" style="margin-left:-150px; margin-top:20px; opacity: .5;"
      onclick="update_profile()" value="change profile pic">
    <div id="theform1">
      <form enctype="multipart/form-data" action="{{ route('profile.store') }}" method="POST">
        {{csrf_field()}}
        <input type="file" name="profile" id="myprofilepic" onchange="form.submit()" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
    </div>
    <!--End of profile pic change-->
  </div>
</div>



<div class="container">

  <!-- Start of first row. First row contains user personal info in left and write post on right -->
  <div class="row" style="padding-top: 30px;">
    <!-- User personal information start -->
    <div class="col-md-4 col-sm-12 col-lg-4 " style="background-color: #f2f2f2;">
      <a>
        <i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#personalInfoModal" style="margin-top: 10px;" aria-hidden="true"></i>
      </a>

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
      <p>Availability:
        <strong> {{ $user->available_for_job }} </strong>
      </p>

    </div>


    <!--Modal for user personal information start-->
    <div class="modal fade" id="personalInfoModal" role="dialog" style="margin-top:12%; margin-left: -30%;">
      <div class="modal-dialog" style="width: 400px">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Personal Information</h3>
          </div>

          <div class="modal-body">

            <li>Education:
              <strong> {{ $user->education }} </strong>
            </li>
            <li>Email:
              <strong> {{ $user->email }} </strong>
            </li>
            <li>Phone:
              <strong> {{ $user->phone_no }} </strong>
            </li>
            <li>Sex:
              <strong> {{ $user->gender }} </strong>
            </li>
            <li>Birth date:
              <strong> {{ $user->dob }} </strong>
            </li>
            <li>Location:
              <strong> {{ $user->location }} </strong>
            </li>
            <li>Availability:
              <strong> {{ $user->available_for_job }} </strong>
            </li>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-azure pull-right" data-dismiss="modal">Close</button>
            <ul class="nav nav-pills pull-left">
              <a href="/profile/{{$user->id}}/edit">Update personal Information
                <span>
                  <i class="fa fa-pencil"></i>
              </a>
              </span>
            </ul>
          </div>
        </div>

      </div>
    </div>
    <!--end Modal for user personal information-->
    <!-- User personal information end -->



    <!--write post section start -->
    <div class="col-md-8 col-sm-12 col-lg-8 ">

      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="btn-group btn-group-md">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Make post</button>

          </div>
        </div>

        <div class="panel-body">
          <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something" data-toggle="modal" data-target="#myModal"
            style="resize: none;"></textarea>
        </div>

        <div class="panel-heading">
          <div class="modal-footer">

            <div class="panel-heading pull-left">
              <div class="btn-group btn-group-md">
                <button type="button" class="btn btn-primary">Photo/File</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!--Write post section end -->
  </div>
  <!-- end of first row. First row contains user personal info in left and write post on right -->

  <!--Start of second row which contains professional information in left and posts show on right -->
  <div class="row" style="margin-top:-10px;">

    <!--Professional information start -->
    <div class="col-md-4 col-sm-12 col-lg-4 " style="background-color: #f2f2f2;">
      <a>
        <i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#professionalInfoModal" style="margin-top: 10px;"
          aria-hidden="true"></i>
      </a>
      </br>
      <p>Profession:
        <strong> {{ $interest->profession }} </strong>
      </p>
      <p>Industry:
        <strong> {{ $interest->industry }} </strong>
      </p>
      </br>
    </div>

    <!--Professional information modal start -->
    <div class="modal fade" id="professionalInfoModal" role="dialog" style="margin-top:12%; margin-left: -30%;">
      <div class="modal-dialog" style="width: 400px">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Professional Information</h3>
          </div>

          <div class="modal-body">

            <li>Profession:
              <strong> {{ $interest->profession }} </strong>
            </li>
            <li>Industry:
              <strong> {{ $interest->industry }} </strong>
            </li>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-azure pull-right" data-dismiss="modal">Close</button>
            <ul class="nav nav-pills pull-left">
              <a href="/interests/{{$interest->id}}/edit">Update professional Information
                <span>
                  <i class="fa fa-pencil"></i>
              </a>
              </span>
            </ul>
          </div>
        </div>

      </div>
    </div>
    <!--Professional information modal end -->
    <!--Professional information end -->

    <!-- General post show start -->
    <div class="col-md-8 col-sm-12 col-lg-8 ">
      @foreach($posts as $post)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#">
                      <i class="glyphicon glyphicon-chevron-down pull-right"></i>
                    </a>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{ $user->firstname }}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $post->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body" style="background-color: #f2f4f7; border-radius: 10px;  padding: 10px">
            <p>{{ $post->description }} </p>

             <!--project show-->
            @if($post['post_type']=="project")
              <div class=" row">
                <div class="col-md-12">
                  <a href="{{ $post['url'] }} "> {{ $post['url'] }}</a>
                </div>
              </div>
            @endif
            <!-- end project show-->
          </section>

          <section class="post-footer">
            <div class="row">
              <div class="col-md-12">
                <ul class="list-unstyled">
                  <li>
                    <!-- Shows Rate text and icon if post type is Project-->
                    @if($post['post_type']=="project")
                      <a href="#"><i class="fa fa-star" aria-hidden="true"></i>Rate</a>
                    @else
                      <a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a>
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
            <div class="row">
              <div class="post-footer-comment-wrapper">
                <div class="col-md-12 col-sm-12 col-lg-12">
                  <div class="comment-form">

                  </div>
                  <div class="comment">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g"
                            width="32" height="32" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <a href="#" class="anchor-username">
                          <h4 class="media-heading">{{ $user->firstname }}</h4>
                        </a>
                        <a href="#" class="anchor-time"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </section>


        </div>
      </div>
      @endforeach

      <!-- General post show end -->

      <!--availablepostshow-->

      @foreach($useravailablepost as $useravailablepost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#">
                      <i class="glyphicon glyphicon-chevron-down pull-right"></i>
                    </a>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{ $user->firstname }}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $useravailablepost->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>

          <section class="post-body" style="background-color: #ded5e0; border-radius: 10px; border-style: inset; padding: 10px">
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
              <a target="_blank" href="/uploads/attachment/{{$useravailablepost['CV']}}">
                Download CV from here..</a>
            </li>
          </section>

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
                  <div class="comment-form">

                  </div>
                  <div class="comment">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g"
                            width="32" height="32" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <a href="#" class="anchor-username">
                          <h4 class="media-heading">{{ $user->firstname }}</h4>
                        </a>
                        <a href="#" class="anchor-time">51 mins</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </section>


        </div>
      </div>
      @endforeach
      <!--end of available post show-->

      <!--Job hiring post show start -->
      @foreach($jobpost as $jobpost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#">
                      <i class="glyphicon glyphicon-chevron-down pull-right"></i>
                    </a>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading">{{ $user->firstname }}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $jobpost->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body" style="background-color: #d4fcbd; border-radius: 10px; border-style: outset; padding: 10px">
            <h4 style="font-weight:bold;">******Hiring post******</h4>
            <p>
              <li>Position :
                <strong>{{ $jobpost->position }}</strong>
              </li>
            </p>
            <p>
              <li>Profession :
                <strong>{{ $jobpost->profession }}</strong>
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
                  <div class="comment-form">

                  </div>
                  <div class="comment">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g"
                            width="32" height="32" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <a href="#" class="anchor-username">
                          <h4 class="media-heading">{{ $user->firstname }}</h4>
                        </a>
                        <a href="#" class="anchor-time">51 mins</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </section>


        </div>
      </div>
      @endforeach
      <!--Job hiring post show end -->
    </div>
  </div>
</div>




<!--Modal for post area start start-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="btn-group btn-group-md">
          <button type="button" class="btn btn-link">Make post</button>

        </div>
      </div>

      <form method="post" action="{{ route('profile.store')  }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="post">


        <div class="modal-body row">
          <div class="col-md-12">
            Post type :
            <input type="radio" name="post_type" value="status" checked> Status
            <input type="radio" name="post_type" value="project"> Project @if ($errors->has('post_type'))
            <span class="help-block">
              <strong>{{ $errors->first('post_type') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group col-md-12">
            <br>
            <textarea id="textareaID1" class="form-control input-lg p-text-area" rows="2" placeholder="Write something" name="description"
              style="resize: none;" required autofocus></textarea>
          </div>



          <div class="form-group col-md-12" id="show_porjectFields">
            <input id="url" class="form-control input-lg p-text-area" placeholder="URL" name="url" style="resize: none;" required>
          </div>

        </div>

        <div class="modal-footer">

          <div class="form-group">

                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle pull-right" 
                    type="button" data-toggle="dropdown"  id="btn_text" style="margin-left:10px;">
                   
                  </button>
                    
                  <ul class="dropdown-menu pull-right" style="padding-left:10px ;" >

                    <div >
                      <label>
                        <input type="checkbox" id="selectall" checked > All Connection
                      </label>
                    </div>

                    <div>
                      <label>
                        <input type="checkbox" id="checkItem1" class="checkItem" name="type[]" value="{{$interest->profession}}" checked required> {{$interest->profession}}
                      </label>
                    </div>
                    <div >
                      <label>
                        <input type="checkbox" id="checkItem2" class="checkItem" name="type[]" value="{{$interest->industry}}" checked required> {{$interest->industry}}
                      </label>
                    </div>
                    <div >
                      <label>
                        <input type="checkbox" id="checkItem3" class="checkItem" name="type[]" value="{{$user->education}}" checked required> {{$user->education}}
                      </label>
                    </div>
                   
              
                  </ul>
                </div>

                <button type="submit" class="btn btn-primary pull-right" >Post</button>
              </div>

          <script type="text/javascript">
           //shows projects fields
                $(document).ready(function(){
                    $("#show_porjectFields").hide();
                    $('#url').removeAttr('required');
                   $("input[name='post_type']").click(function(){
                    var post_type=$("input[name='post_type']:checked").val();
                    if(post_type =="project")
                    {
                       $('#url').attr('required',true);
                      $("#show_porjectFields").show();
                      
                    }
                      
                    else{
                      
                      $('#url').removeAttr('required');
                      $("#show_porjectFields").hide();
                     
                    }
                      
                  });

                  //select all check box

              $("#btn_text").html("All Connection  <span class='caret'></span>");
               $("#selectall").click(function(){
                 $("#btn_text").html("All Connection  <span class='caret'></span>");
                    if(this.checked){
                      
                        $('.checkItem').each(function(){
                        this.checked = true;
                        
                        
                    })
                    }else{
                      $("#btn_text").html("Select Connection <span class='caret'></span>");
                         $('.checkItem').each(function(){
                            this.checked = false;
                         })
                      }
                  });

                  $(".checkItem").click(function(){
                    $('#selectall').removeAttr('checked');
                    $('.checkItem').removeAttr('checked');
                    var checkedItems=$('.checkItem:checked');
                    if(checkedItems.length >0)
                    {
                      var res="";
                      checkedItems.each(function (){
                        res+=$(this).val() +" ";
                      });
                      $("#btn_text").html(res +"<span class='caret'></span>");
                    }else{
                      $("#btn_text").html(checkedItem.val() +"<span class='caret'></span>");
                    }
                    
                    
                  });
               
                //end select all check box
                });
                
                
                //handles visivility validation
                $(function(){

                  var requiredCheckboxes = $(':checkbox[required]');
                  requiredCheckboxes.change(function(){

                  if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                  }

                   else {
                     requiredCheckboxes.attr('required', 'required');
                     
                     }
                  });
                });
          </script>

          <ul class="nav nav-pills pull-left">
            <li id="tooltip">
              <a href="#">
                <i class="fa fa-map-marker">
                  <span id="tooltiptext">Check-in</span>
                </i>
              </a>
            </li>
            <li id="tooltip">
              <a href="#">
                <i class="fa fa-camera">
                  <span id="tooltiptext">Upload image</span>
                </i>
              </a>
            </li>
            <li id="tooltip">
              <a href="#">
                <i class="fa fa-film">
                  <span id="tooltiptext">Upload video</span>
                </i>
              </a>
            </li>
            <li id="tooltip">
              <a href="#">
                <i class="fa fa-microphone">
                  <span id="tooltiptext">Record voice</span>
                </i>
              </a>
            </li>
          </ul>
        </div>

      </form>
    </div>

  </div>
</div>
<!--end Modal for post area-->




<script type="text/javascript">
  function update_cover() {
    document.getElementById('my_file').click();
  }



  function update_profile() {
    document.getElementById('myprofilepic').click();
  }
</script>



@endsection