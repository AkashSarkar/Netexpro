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
    "MSCSE",
    "Marketing",
    "Accounting",
    "Cooking",
    "Information Technology"
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
    <h1 style=" font: italic bold 30px/30px Georgia, serif;">{{ $user->firstname }} {{ $user->lastname }} </h1>
    <p>{{ $interest->profession }}</p>
    <p>Projects done by {{ $user->firstname }} :
      <strong> {{ $projects }} </strong>
    </p>

  </div>

  <div class="row" style="padding-top: 10px;">
    <div class="col-md-4 col-sm-4 col-lg-4 pull-right">

      <button type="submit" class="btn btn-primary" style="margin-left: 200px;" data-toggle="tooltip" data-placement="bottom" title=' Show Activity Log'>
        <a href="{{ url('availableforjob') }}" style="color: inherit; text-decoration: inherit;">
          <i class="fas fa-chart-area" aria-hidden="true"></i> Activity Log</a>
      </button>

    </div>
    <!--profile pic change start-->
    <input id="Updateprofile" type="button" class="btn btn-default btn-sm" style="margin-left:-135px; margin-top:-10px; opacity: .5;"
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
  <div class="row">
    <div class="column side">
     <!--Personal information start-->
      <section style="background-color: white; border-width:5px;  
                      border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">

        <a>
          <i class="fas fa-pencil-alt pull-right" data-toggle="modal" data-target="#personalInfoModal" style="margin-top: 10px;cursor:pointer"
            aria-hidden="true"></i>
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
       
        <!--Modal for user personal information start-->
        <div class="modal fade " id="personalInfoModal" role="dialog">
          <div class="modal-dialog ">
       
         <form class="form-horizontal"  method="post" action="{{ route('profile.update',[Auth::user()->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Personal Information
                  <strong> {{ $user->firstname }} </strong>
                </h3>
              </div>

              <form class="form-horizontal"  method="post" action="{{ route('profile.update',[Auth::user()->id]) }}">
                {{ csrf_field() }}

              <input type="hidden" name="_method" value="put">

                <div class="modal-body">
                      <div class="panel-body">
                  
                          <!-- First Name -->
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Firstname</label>

                            <div class="col-md-6">
                                <input placeholder="firstname" id="firstname" type="text" class="form-control" 
                                name="firstname" value="{{ $user->firstname }}"  autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <!-- Last Name -->
                         <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">LastName</label>

                            <div class="col-md-6">
                                <input placeholder="lastname" id="lastname" type="text" class="form-control" 
                                name="lastname" value="{{ $user->lastname }}"  autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Education -->
                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Education</label>

                            <div class="col-md-6">
                               <!-- <input placeholder="Institution Name" id="education" type="text" class="form-control" name="education" value="{{ $user->education }}" autofocus>-->

                               <select class="form-control" name="education"  value="{{ old('education')}}" >
                                 <span class="caret"></span>
                                 <option>{{ $user->education }}</option>
                                 @foreach( $educations as $education)
                                 <option>{{ $education }}</option>
                                 @endforeach
                                </select>

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Email-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Phone number -->
                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input placeholder="Optional" id="phone_no" type="text" class="form-control" 
                                name="phone_no" value="{{ $user->phone_no }}"  autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- Gender -->
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender<span class="required">*</span></label>

                            <div class="col-md-6">
                                <select placeholder="Gender" id="gender" type="text" class="form-control" 
                                name="gender" value="{{ $user->gender }}" autofocus>
                                @if ($user->gender=="Female")
                                <option>Female</option>
                                <option>Male</option>
                                
                                @elseif ($user->gender=="Male")
                                <option>Male</option>
                                <option>Female</option>
                               
                                @else
                                <option>Select-Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                @endif
                               

                                
                                   
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <!-- Date of birth -->
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date of Birth <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ $user->dob }}" autofocus>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                         <!-- location -->
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input placeholder="location" id="location" type="text" class="form-control" 
                                name="location" value="{{ $user->location }}"  autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <!-- Availability-->
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Availability<span class="required">*</span> </label>

                            <div class="col-md-6">
                                <select placeholder="available for a job??" id="available_for_job" type="text" class="form-control" 
                                name="available_for_job" value="{{ $user->available_for_job }}" autofocus>
                                @if ($user->available_for_job=="yes")
                                <option>Yes</option>
                                <option>No</option>
                                
                                @elseif ($user->available_for_job=="No")
                                <option>No</option>
                                <option>Yes</option>
                               
                                @else
                                <option>Select-Availability</option>
                                <option>Yes</option>
                                <option>No</option>
                                @endif
                                </select>

                                @if ($errors->has('available_for_job'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('available_for_job') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div>

              <div class="modal-footer">
                <div class="col-md-6 col-md-offset-4 pull-right">
                   <button type="submit" class="btn btn-primary">
                     Update
                   </button>
                </div>
              </div>

            </div>
          </form>
         </div>
        </div>
      </section>
        <!--end Modal for user personal information-->
        <!--Personal information end-->
     

      </br>

      <section style="background-color: white; border-width:5px;  
                      border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
          <!--Professional information start -->

          <a>
            <i class="fas fa-pencil-alt pull-right" data-toggle="modal" data-target="#professionalInfoModal" style="margin-top: 10px;cursor:pointer;"
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


          <!--Professional information modal start -->
          <div class="modal fade" id="professionalInfoModal" role="dialog">
            <div class="modal-dialog" >
             
            <form class="form-horizontal"  method="post" action="{{ route('interests.update',[Auth::user()->id]) }}">

            {{ csrf_field() }}

              <input type="hidden" name="_method" value="put">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3>Professional Information</h3>
                </div>
                     <div class="modal-body" style=" margin-top: 10px; ">
                         <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                              <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>

                              <div class="col-md-6">

                                  <select class="form-control" name="profession"  value="{{ old('profession')}}" >
                                   <span class="caret"></span>
                                   <option>{{ $interest->profession }}</option>
                                   @foreach( $professions as $profession)
                                   <option>{{ $profession }}</option>
                                   @endforeach
                                  </select>


                                  @if ($errors->has('profession'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('profession') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                              <label for="industry" class="col-md-4 control-label">Industry<span class="required">*</span></label>

                              <div class="col-md-6">
                                <!--  <input id="industry" type="text" class="form-control" name="industry" value="{{ $interest->industry }}" required autofocus>-->
                                 <select class="form-control" name="industry"  value="{{ old('industry')}}" >
                                   <span class="caret"></span>
                                   <option>{{ $interest->industry }}</option>
                                   @foreach( $industries as $industry)
                                   <option>{{ $industry }}</option>
                                   @endforeach
                                  </select>

                                  @if ($errors->has('industry'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('industry') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                           <button type="submit" class="btn btn-primary">
                            Update
                           </button>
                        </div>
                    </div>
               </div>
            </form>

            </div>
          </div>
         
        </section>
        <!--Professional information modal end -->
        <!--Professional information end -->
        
        </br>

        <!--Interest modal start here-->
 
        <section style="background-color: white; border-width:5px;  
             border-style:outset; padding: 10px; box-shadow: 10px 10px 5px #888888;">
        <!--Professional information start -->
       {{--@if(count($choices)==0)--}} 
         <a>
          <i class="fas fa-pencil-alt pull-right" data-toggle="modal" data-target="#interestInfo" style="margin-top: 10px;cursor:pointer;"
            aria-hidden="true"></i>
        </a>
        
       {{-- @endif--}}

        </br>
           <p>Interest:
             @foreach($choices as $choice)
             <ol><strong>{{ $choice->profession }}</strong></ol>
             @endforeach
        </p>

        
        </br>

        

      <!--Interest information modal start -->
        <div class="modal fade" id="interestInfo" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Interest Information</h3>
              </div>

              <form id="loginForm" onsubmit="return validateForm()" class="form-horizontal"  method="POST" action="/desire">
                        {{ csrf_field() }}

              <div class="modal-body" style="margin-top: 10px;">
               <div class="form-group{{ $errors->has('desires') ? ' has-error' : '' }}">
                <label for="desires" class="col-md-4 control-label">interests</label>

                <div class="col-md-6">
                     
                        <select class="form-control" name="desire[]"  value="{{ old('desires') }}"  multiple="multiple" id="desire">
                            <span class="caret"></span>
                            @foreach( $desires as $desire)
                            <option>{{ $desire }}</option>
                            @endforeach
                        </select>

                    @if ($errors->has('choices'))
                        <span class="help-block">
                            <strong>{{ $errors->first('choices') }}</strong>
                        </span>
                    @endif
                
                 <div id="error" style="color: red;"></div>
                </div>


            </div>
         </div>
           <div class="modal-footer">
              <div class="col-md-6 col-md-offset-4 pull-right">
                 <button type="submit" class="btn btn-primary">
                  Update
                 </button>
              </div>
          </div>

           </form>
            </div>

          </div>
        </div>
        </section>
     
        <!--Interest modal end here-->
      
    </div>

    <div class="column middle">

      <div class="panel panel-default" style="background-color: white; border-width:5px;  
        border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;" 
        data-toggle="modal" data-target="#myModal">
        <div class="panel-heading">
          <div class="btn-group btn-group-md">
            <button type="button" class="btn btn-link">Make post</button>

          </div>
        </div>

        <div class="panel-body">
          <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something" style="resize: none;" id="user_post"
            disabled></textarea>
        </div>

        <div class="panel-heading">
          <div class="btn-group btn-group-md">

          </div>
        </div>
      </div>


      <!-- Post show start -->
      @if($posts!=null) @foreach($posts as $userpost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    @if($userpost->user_id == Auth::user()->id)
                    <div class="dropdown ">
                    <button class="pull-right dropdown-toggle   btn btn-link" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>

                      <ul class="dropdown-menu pull-right">
                        <li>
                          <a href="#" onclick="
                             var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form').submit();
                              } "> Delete </a>

                          <form id="delete-form" action="{{ route('post.destroy', $userpost->post_id) }}" method="POST" style="display:none;">
                            <input type="hidden" name="_method" method="PUT" value="delete"> {{ csrf_field() }}
                          </form>

                        </li>
                      </ul>

                    </div>
                    @endif

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

      <!--post show end -->


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
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="dropdown ">
                    <button class="pull-right dropdown-toggle   btn btn-link" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i>
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

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading">{{ $user->firstname }}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $jobpost->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-lg" style="background-color: #CFD8DC; border-radius: 4px;">
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

          </section>




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
                      <input type="hidden" name="commentable_type" value="App\Jobpost">
                      <input type="hidden" name="commentable_id" value="{{ $jobpost['jobpost_id'] }}">

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
            @foreach($jobComment as $comment) @if( $jobpost['jobpost_id']==$comment->commentable_id)

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

                    {{--
                    <div class="comment-buttons-holder">
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
      <!--Job hiring post show end -->

    </div>
  </div>
</div>

<!--Modal for post area start start-->
@include('template.postModal')
<!--end Modal for post area-->


<script type="text/javascript">
  function update_cover() {
    document.getElementById('my_file').click();
  }



  function update_profile() {
    document.getElementById('myprofilepic').click();
  }

  function upload_image() {
    document.getElementById('my_images').click();
  }
  //image show while select

  $(document).ready(function () {

    $('input[type="file"]').change(function (e) {
      if(this.files.length>5)
      {
         $("#error").html('Maximum 5 image');
         $(':input[type="submit"]').prop('disabled', true);
      }
      else if(this.files.length<=5)
      {
        $("#error").empty();
        $(':input[type="submit"]').prop('disabled', false);
      }
      $('#image_preview').empty();

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
 </script>
 <script>
  function validateForm() {
  var options = document.getElementById('desire').options, count = 0;
    for (var i=0; i < options.length; i++) {
     if (options[i].selected) count++;
    }
     if(count>5)
     {
         var message=document.getElementById('error');
         message.innerHTML="Maximum 5 interset can be selected";
         return false;
     }
    
   }
 </script>

@endsection