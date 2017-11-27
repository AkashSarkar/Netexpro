@extends('layouts.app') 

@section('page-title')
   {{ $user->firstname }} {{ $user->lastname }}
@endsection

@section('content')


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

      <div class="panel-heading">
        <div class="btn-group btn-group-md">
          <button type="button" class="btn btn-primary">Update Info</button>
          <button type="button" class="btn btn-link">|</button>
          <button type="button" class="btn btn-primary">View activity log</button>

        </div>
      </div>

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
<section style="background-color: white; border-width:5px;  
    border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
 
      <a>
        <i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#personalInfoModal" style="margin-top: 10px;cursor:pointer" aria-hidden="true" ></i>
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

   


    <!--Modal for user personal information start-->
    <div class="modal fade" id="personalInfoModal" role="dialog" style="margin-top:12%; margin-left: -30%;">
      <div class="modal-dialog" style="width: 400px">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Personal Information <strong> {{ $user->firstname }} </strong></h3>
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
     </section>
   </br>
     <section style="background-color: white; border-width:5px;  
    border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
     <!--Professional information start -->
    
      <a>
        <i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#professionalInfoModal" style="margin-top: 10px;cursor:pointer;"
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
     </section>
</div>

<div class="column middle">
  <div class="panel panel-default" style="background-color: white; border-width:5px;  
    border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
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
          <div class="btn-group btn-group-md">
          
          </div>
        </div>
      </div>


      <!-- Post show start -->

      @foreach($posts as $post)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">

                    <div class="dropdown ">
                      <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                      </button>
                      
                        <ul class="dropdown-menu pull-right">
                          <li><a href="#" 
                            onclick="
                             var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form').submit();
                              }
                                    " 
                                     >

                                     Delete

                          </a>
                          
                          <form id="delete-form" action="{{ route('post.destroy', $post['post_id']) }}" method="POST" style="display:none;">
                             <input type="hidden" name="_method" method="PUT" value="delete">
                             {{ csrf_field() }}
                          </form>

                          </li>
                        </ul>
                      
                    </div>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{ $user->firstname }}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $post->created_at }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-sm " style="background-color: #EEEEEE; border-radius: 4px;  ">
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

                     <!--image show-->
                     @foreach($images as $imgpost)
                            @if( $post['post_id']==$imgpost->post_id)
                               <h4>Project Images : </h4>
                                  <div class=" row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="well well-sm">
                                          
                                                  @foreach($images as $imagepost)
                                                    @if($post['post_id']==$imagepost->post_id)
                                                    <img class="fb-image-lg" 
                                                      src="/uploads/postimages/{{$imagepost->post_image}}" alt="Project image "
                                                      style="height:100px;width:20%;"/>
                                                    @endif
                                                  @endforeach
                                            </div>
                                        </div>
                                      </div>
                                @break;
                            @endif
                       @endforeach
                      <!-- end image show-->
          </section>

          <section class="post-footer">
            <div class="row">
              <div class="col-md-12">
                <ul class="list-unstyled">
                  <li>
                    <!-- Shows Rate text and icon if post type is Project-->
                    @if($post['post_type']=="project")
                      
                                   <div class="HeaderBarThreshold" onclick=()>
                                   <form method="post" action="{{ route('rating.store') }}" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="post_id" value="{{$post['post_id']}}">
                           
                                            <div class="star-rating" style="position:absolute;margin-top:-40px; margin-left:-20px;">
                                              <input id="star-10" type="submit" name="rating" value="10" style="visibility:hidden;" >
                                              <label for="star-10" title="10 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-9" type="submit" name="rating" value="9" style="visibility:hidden;">
                                              <label for="star-9" title="9 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i> 
                                              </label>
                                              <input id="star-8" type="submit" name="rating" value="8" style="visibility:hidden;">
                                              <label for="star-8" title="8 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-7" type="submit" name="rating" value="7" style="visibility:hidden;">
                                              <label for="star-7" title="7 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-6" type="submit" name="rating" value="6" style="visibility:hidden;">
                                              <label for="star-6" title="6 star" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-5" type="submit" name="rating" value="5" style="visibility:hidden;" >
                                              <label for="star-5" title="5 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-4" type="submit" name="rating" value="4" style="visibility:hidden;">
                                              <label for="star-4" title="4 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i> 
                                              </label>
                                              <input id="star-3" type="submit" name="rating" value="3" style="visibility:hidden;">
                                              <label for="star-3" title="3 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-2" type="submit" name="rating" value="2" style="visibility:hidden;">
                                              <label for="star-2" title="2 stars" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                              <input id="star-1" type="submit" name="rating" value="1" style="visibility:hidden;">
                                              <label for="star-1" title="1 star" id="star"  style="visibility:hidden;">
                                                  <i class="active fa fa-star" aria-hidden="true"></i>
                                              </label>
                                            </div>
                                            
                                          <a href="#" ontouchstart=""> <i class="active fa fa-star" aria-hidden="true"></i> Rate</a>
                                          <strong>average rate</strong>
                               
                                          </form>
                                            
                              </div>
                    @else
                      <a href="#" ><i class="glyphicon glyphicon-thumbs-up"></i> Like</a>
                    @endif
                  <!--End Shows Rate text and icon if post type is Project-->


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
                



                  <!--Comment show start -->
                   @foreach($userComment as $comment)
                    <div class="well well-sm">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                            <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}"
                            width="32" height="32" alt="...">
                        </a>
                        </div>
                         <div class="media-body">
                            <a href="#" class="anchor-username">
                              <h4 class="media-heading"><a href="#">{{ $comment->firstname }}</a></h4>
                            
                            <a href="#" class="anchor-time">{{ $comment->created_at }}</a>
                          </div>
                        <div class="commentText">
                            <p class="">{{ $comment->body }}</p> 
                        </div>
                     </div>
                    </div>
                    @endforeach
                    <!--Comment show end-->
                   
                    <!--Create Comment start -->
                    <div class="comment-form">
                      <div class="comment">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                                width="32" height="32" alt="...">
                            </a>
                          </div>

                          <div class="media-body">
                           <form method="POST" action="{{ route('comment.store') }}">
                           {{ csrf_field() }}

                              <input type="hidden" name="commentable_type" value="App\Post">
                              <input type="hidden" name="commentable_id" value="{{ $post['post_id'] }}">
                      

                              <div class="form-group">
                                  <input class="form-control" type="text" name="body" placeholder="Your comments" />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="file" name="url" placeholder="upload file/image" />
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-default">Add</button>
                              </div>
                          </form>
                          </div>
                        </div>
                        </div>
                    </div>
                    <!--Create Comment end -->


                </div>
              </div>
            </div>

          </section>
       </div>
      </div>
      @endforeach

      <!--post show end -->

      
     <!--availablepostshow-->

      @foreach($useravailablepost as $useravailablepost)
      <div class="panel panel-default" >
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                   <div class="dropdown ">
                      <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                      </button>
                      
                        <ul class="dropdown-menu pull-right">
                          <li><a href="#" 
                            onclick="
                             var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form1').submit();
                              }
                                    " 
                                     >

                                     Delete

                          </a>
                          
                          <form id="delete-form1" action="{{ route('availableforjob.destroy', $useravailablepost['useravailablepost_id']) }}" method="POST" style="display:none;">
                             <input type="hidden" name="_method" method="PUT" value="delete">
                             {{ csrf_field() }}
                          </form>

                          </li>
                        </ul>
                      
                    </div>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{ $user->firstname }}</h4>
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


                   <!--Comment show start -->
                   @foreach($useravailableComment as $comment)
                    <div class="well well-sm">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                            <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}"
                            width="32" height="32" alt="...">
                        </a>
                        </div>
                         <div class="media-body">
                            <a href="#" class="anchor-username">
                              <h4 class="media-heading">{{ $comment->firstname }}</h4>
                            </a>
                            <a href="#" class="anchor-time">{{ $comment->created_at }}</a>
                          </div>
                        <div class="commentText">
                            <p class="">{{ $comment->body }}</p> 
                        </div>
                     </div>
                    </div>
                    @endforeach
                    <!--Comment show end-->
                   
                    <!--Create Comment start -->
                    <div class="comment-form">
                      <div class="comment">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                                width="32" height="32" alt="...">
                            </a>
                          </div>

                          <div class="media-body">
                           <form method="POST" action="{{ route('comment.store') }}">
                           {{ csrf_field() }}

                              <input type="hidden" name="commentable_type" value="App\AvailableForJob">
                              <input type="hidden" name="commentable_id" value="{{ $useravailablepost['useravailablepost_id'] }}">

                              <div class="form-group">
                                  <input class="form-control" type="text" name="body" placeholder="Your comments" />
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="file" name="url" placeholder="upload file/image" />
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-default">Add</button>
                              </div>
                          </form>
                          </div>
                        </div>
                        </div>
                    </div>
                    <!--Create Comment end -->


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
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                      <div class="media-body">
                        <div class="dropdown ">
                      <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                      </button>
                      
                        <ul class="dropdown-menu pull-right">
                          <li><a href="#" 
                            onclick="
                             var result = confirm('Are you sure you want to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form2').submit();
                              }
                                    " 
                                     >

                                     Delete

                          </a>
                          
                          <form id="delete-form2" action="{{ route('jobpost.destroy', $jobpost['jobpost_id']) }}" method="POST" style="display:none;">
                             <input type="hidden" name="_method" method="PUT" value="delete">
                             {{ csrf_field() }}
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
                <div class="row">
                  <div class="post-footer-comment-wrapper">
                    <div class="col-md-12 col-sm-12 col-lg-12">

                       <!--Comment show start -->
                   @foreach($jobComment as $comment)
                    <div class="well well-sm">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                            <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$comment->p_pic}}"
                            width="32" height="32" alt="...">
                        </a>
                        </div>
                         <div class="media-body">
                            <a href="#" class="anchor-username">
                              <h4 class="media-heading">{{ $comment->firstname }}</h4>
                            </a>
                            <a href="#" class="anchor-time">{{ $comment->created_at }}</a>
                          </div>
                        <div class="commentText">
                            <p class="">{{ $comment->body }}</p> 
                        </div>
                     </div>
                    </div>
                    @endforeach
                    <!--Comment show end-->
                   
                    <!--Create Comment start -->
                    <div class="comment-form">
                      <div class="comment">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                                width="32" height="32" alt="...">
                            </a>
                          </div>

                          <div class="media-body">
                           <form method="POST" action="{{ route('comment.store') }}">
                           {{ csrf_field() }}

                              <input type="hidden" name="commentable_type" value="App\Jobpost">
                              <input type="hidden" name="commentable_id" value="{{ $jobpost['jobpost_id'] }}">
                        

                              <div class="form-group">
                                  <input class="form-control" type="text" name="body" placeholder="Your comments" />
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-default">Add</button>
                              </div>
                          </form>
                          </div>
                        </div>
                        </div>
                    </div>
                    <!--Create Comment end -->


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

      <form method="post" enctype="multipart/form-data" action="{{ route('profile.store')  }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="post">


        <div class="modal-body row">
          <div class="col-md-12">
            Post type :
            <input type="radio" name="post_type" value="status" checked> Status
            <input type="radio" name="post_type" value="project"> Project 
            
          </div>

          <div class="form-group col-md-12">
            <br>
            <textarea id="textareaID1" class="form-control input-lg p-text-area" rows="2" placeholder="Write something" name="description"
              style="resize: none;" required autofocus></textarea>
          </div>



          <div class="form-group col-md-12" id="show_porjectFields">
            <input id="url" class="form-control input-lg p-text-area" placeholder="URL" name="url" style="resize: none;" required>
          </div>


          <div class="form-group col-md-12" >
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  
                       <a  id="image_preview"></a>
                   
             </div>
        </div>
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
            <span onclick="upload_image()">
              <i class="fa fa-camera">
                <span id="tooltiptext">Upload image</span>
              </i>
              </span>
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input id="my_images" type="file" name="post_images[]" multiple="true" style="display: none;">
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

  function upload_image()
  {
    document.getElementById('my_images').click();
  }
     //image show while select
     
     $(document).ready(function(){
      $('input[type="file"]').change(function(e){
        for(var i=0;i<this.files.length;i++){
        var file = this.files[i];
        var reader = new FileReader();
        reader.onload = function(e){
          
            $('<img />',{
                "src":e.target.result,
                "width":"15%",
                "height":"100px",
                "style":"padding:2px; width:20% ; height:100px;",
            }).appendTo(image_preview);
        }
      
        reader.readAsDataURL(this.files[i]);
        }
        });
    });
                //end image show while select

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



@endsection





