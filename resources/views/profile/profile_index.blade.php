@extends('layouts.app')

@section('content')


    <div class="fb-profile">
       <div>
        <img align="left" class="fb-image-lg" src="/uploads/cover/{{ $user->cover_pic }}" alt="Profile image example" style="height:400px;width:100%;"/>
        <button id="Updateimage" type="button" class="btn btn-default btn-sm pull-right" style="margin-top:-40px; opacity: .5;" onclick="showForm()">
        <i class="fa fa-upload" aria-hidden="true">Change Cover Photo</i>
        </button>
        <div id="theform" class="pull-right" style="margin-top:-60px;opacity: 50;">
         <form enctype="multipart/form-data" action="{{ route('profile.store') }}" method="POST">
               {{csrf_field()}}
              <!--  <label>Update Profile Image</label>-->
                <input type="file" name="cover" style="
                .custom-file-input::-webkit-file-upload-button {
                    visibility: hidden;
                    }
                    .custom-file-input::before {
                    content: 'Select some files';
                    display: inline-block;
                    background: -webkit-linear-gradient(top, #b2b2b2, #e3e3e3);
                    border: 1px solid #999;
                    border-radius: 5px;
                    padding: 0px 0px;
                    outline: none;
                    white-space: nowrap;
                    -webkit-user-select: none;
                    cursor: pointer;
                    text-shadow: 1px 1px #fff;
                    font-weight: 700;
                    font-size: 10pt;
                    }
                    .custom-file-input:hover::before {
                    border-color: black;
                    }
                    .custom-file-input:active::before {
                    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
                    }
                
                ">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit">
                
            </form>
        </div>

       </div>

       <!--End of Cover image-->
          <img align="left" class="fb-image-profile thumbnail" src="/uploads/profile/{{ $user->p_pic }}" alt="Profile image example"/>
        <!--End of Profile Pic-->
        <div class="fb-profile-text">
            <h1>{{ $user->firstname }} </h1>
            <p>{{ $interest->profession }}</p>
        </div>

           <div class="row" style="padding-top: 10px;">
              <div class="col-md-4 col-sm-4 col-lg-4 pull-right" >
                
                 <div class="panel-heading">
                     <div class="btn-group btn-group-md">
                         <button type="button" class="btn btn-primary">Update Info</button>
                         <button type="button" class="btn btn-link">|</button>
                         <button type="button" class="btn btn-primary">View activity log</button>
                         
                     </div>
                </div>
               
              </div>
    <!--profile pic change start-->
    <button id="Updateprofile" type="button" class="btn btn-default btn-sm" style="margin-left:-150px; margin-top:20px; opacity: .5;" onclick="showForm1()">
          <i class="fa fa-upload" aria-hidden="true">Change Profile Photo</i>
        </button>
          <div id="theform1">
            <form enctype="multipart/form-data" action="{{ route('profile.store') }}" method="POST">
                {{csrf_field()}}
                <label>Update Profile</label>
                <input type="file" name="profile">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit">
              </form>
        </div>
        <!--End of profile pic change-->
            </div>
    </div>



     <div class="container">

      <!-- Start of first row. First row contains user personal info in left and write post on right -->
          <div class="row" style="padding-top: 30px;">
           <!-- User personal information start -->
               <div class="col-md-4 col-sm-12 col-lg-4 " style="background-color: #f2f2f2;"><a><i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#personalInfoModal" style="margin-top: 10px;" aria-hidden="true" ></i></a>
                  
                         </br>
                            <p>Education:<strong> {{ $user->education }} </strong></p>
                            <p>Email: <strong> {{ $user->email }} </strong> </p>
                            <p>Phone: <strong> {{ $user->phone_no }} </strong> </p>
                            <p>Sex:<strong>  {{ $user->gender }} </strong> </p>
                            <p>Birth date: <strong> {{ $user->dob }} </strong> </p>
                            <p>Location: <strong> {{ $user->location }} </strong> </p>
                            <p>Availability: <strong> {{ $user->available_for_job }} </strong> </p>
                         </br>  
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
                      
                      <div class="modal-body" >
                        
                            <li>Education:<strong> {{ $user->education }} </strong></li>
                            <li>Email: <strong> {{ $user->email }} </strong> </li>
                            <li>Phone: <strong> {{ $user->phone_no }} </strong> </li>
                            <li>Sex:<strong>  {{ $user->gender }} </strong> </li>
                            <li>Birth date: <strong> {{ $user->dob }} </strong> </li>
                            <li>Location: <strong> {{ $user->location }} </strong> </li>
                            <li>Availability: <strong> {{ $user->available_for_job }} </strong> </li>
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-azure pull-right" data-dismiss="modal">Close</button>
                          <ul class="nav nav-pills pull-left">
                             <a href="/profile/{{$user->id}}/edit">Update personal Information  <span><i class="fa fa-pencil"></i></a></span>
                          </ul>
                      </div>
                </div>
                
              </div>
            </div>
            <!--end Modal for user personal information-->
            <!-- User personal information end -->



             <!--write post section start -->
             <div class="col-md-8 col-sm-12 col-lg-8 " >
            
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <div class="btn-group btn-group-md">
                           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Project</button>
                           <button type="button" class="btn btn-link" >|</button>
                           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Job post</button>
                           <button type="button" class="btn btn-link">|</button>
                           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Activity </button>
                       </div>
                    </div>

                    <div class="panel-body">
                        <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something" data-toggle="modal" data-target="#myModal" style="resize: none;"></textarea>     
                    </div>
                    
                    <div class="panel-heading">
                      <div class="modal-footer">
                       
                          <button type="button" class="btn btn-azure pull-right">Post</button>
                           <ul class="nav nav-pills pull-left">
                          <li><a href="#"><i class="fa fa-map-marker"></i></a>Check-in</li>
                          <li><a href="#"><i class="fa fa-camera"></i></a>Image</li>
                          <li><a href="#"><i class=" fa fa-files-o"></i></a>Files</li>
                          <li><a href="#"><i class="fa fa-microphone"></i></a>Voice</li>
                      </ul>
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
                  <div class="col-md-4 col-sm-12 col-lg-4 " style="background-color: #f2f2f2;"><a><i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#professionalInfoModal" style="margin-top: 10px;" aria-hidden="true" ></i></a>
                       </br>
                        <p>Profession: <strong> {{ $interest->profession }} </strong></p>
                        <p>Industry: <strong> {{ $interest->industry }} </strong> </p>
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
                      
                      <div class="modal-body" >
                        
                            <li>Profession: <strong> {{ $interest->profession }} </strong></li>
                            <li>Industry: <strong> {{ $interest->industry }} </strong> </li>
                            
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-azure pull-right" data-dismiss="modal">Close</button>
                          <ul class="nav nav-pills pull-left">
                             <a href="/interests/{{$interest->id}}/edit">Update professional Information  <span><i class="fa fa-pencil"></i></a></span>
                          </ul>
                      </div>
                </div>
                
              </div>
            </div>
            <!--Professional information modal end -->
              <!--Professional information end -->

              <!-- General post show start --> 
              <div  class="col-md-8 col-sm-12 col-lg-8 " >
              @foreach($posts as $post)
                                    <div class="panel panel-default">
                                            <div class="panel-body">
                                               <section class="post-heading">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media">
                                                              <div class="media-left">
                                                                <a href="#">
                                                                  <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
                                                                </a>
                                                              </div>
                                                              <div class="media-body">
                                                                    <a href="#"><i class="glyphicon glyphicon-chevron-down pull-right"></i></a>
                                                        
                                                                    <a href="#" class="anchor-username"><h4 class="media-heading"> {{ $user->firstname }}</h4></a>
                                                       
                                                                <a href="#" class="anchor-time">{{ $post->created_at }}</a>
                                                              </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>             
                                               </section>
                                               <section class="post-body" style="background-color: #f2f4f7; border-radius: 10px;  padding: 10px">
                                                   <p>{{ $post->description }}<hr></p>
                                               </section>
                                             
                                               <section class="post-footer">
                                                   <div class="row">
                                                   <div class="col-md-12">
                                                        <ul class="list-unstyled">
                                                            <li><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>
                                                            <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
                                                            <li><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
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
                                                                  <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="32" height="32" alt="...">
                                                                </a>
                                                              </div>
                                                              <div class="media-body">
                                                                <a href="#" class="anchor-username"><h4 class="media-heading">{{ $user->firstname }}</h4></a> 
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
                                                              <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
                                                            </a>
                                                          </div>
                                                          <div class="media-body">
                                                                <a href="#"><i class="glyphicon glyphicon-chevron-down pull-right"></i></a>
                                                    
                                                                <a href="#" class="anchor-username"><h4 class="media-heading"> {{ $user->firstname }}</h4></a>
                                                   
                                                            <a href="#" class="anchor-time">{{ $useravailablepost->created_at }}</a>
                                                          </div>
                                                        </div>
                                                    </div>
                                                     
                                                </div>             
                                           </section>

                                         <section class="post-body" style="background-color: #ded5e0; border-radius: 10px; border-style: inset; padding: 10px">
                                             <h4 style="font-weight:bold;">******job seeking post******</h4>
                                          <p><li>Position : <strong>{{ $useravailablepost->position }}</strong></li></p>
                                          <p><li>Profession : <strong>{{ $useravailablepost->profession }}</strong></li></p>
                                          <p><li>Preferred Job Location : <strong>{{ $useravailablepost->location }}</strong></li></p>
                                          <p><li>Highlights(Any specified course/skills) : <strong>{{ $useravailablepost->highlight }}</strong></li></p>
                                          <li> <a target="_blank" href="/uploads/attachment/{{$useravailablepost['CV']}}">   
                                          Download CV from here..</a></li>
                                          </section>
                                         
                                           <section class="post-footer">
                                               <div class="row">
                                               <div class="col-md-12">
                                                    <ul class="list-unstyled">
                                                        <li><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>
                                                        <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
                                                        <li><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
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
                                                              <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="32" height="32" alt="...">
                                                            </a>
                                                          </div>
                                                          <div class="media-body">
                                                            <a href="#" class="anchor-username"><h4 class="media-heading">{{ $user->firstname }}</h4></a> 
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
                                                                  <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
                                                                </a>
                                                              </div>
                                                              <div class="media-body">
                                                                    <a href="#"><i class="glyphicon glyphicon-chevron-down pull-right"></i></a>
                                                        
                                                                    <a href="#" class="anchor-username"><h4 class="media-heading">{{ $user->firstname }}</h4></a>
                                                       
                                                                <a href="#" class="anchor-time">{{ $jobpost->created_at }}</a>
                                                              </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>             
                                               </section>
                                               <section class="post-body" style="background-color: #d4fcbd; border-radius: 10px; border-style: outset; padding: 10px">
                                                <h4 style="font-weight:bold;">******Hiring post******</h4>
                                                <p><li>Position : <strong>{{ $jobpost->position }}</strong></li></p>
                                                <p><li>Profession : <strong>{{ $jobpost->profession }}</strong></li></p>
                                                <p><li>No. of Vacancy : <strong>{{ $jobpost->vacancy_number }}</strong></li></p>
                                                <p><li>Job Circular: <strong>{{ $jobpost->circular }}</strong></li></p>
                                                <p><li>Company Details: <strong>{{ $jobpost->company_details }}</strong></li></p>
                                                <p><li>Job Responsibilities: <strong>{{ $jobpost->job_details }}</strong></li></p>
                                                <p><li>Job Location : <strong>{{ $jobpost->location }}</strong></li></p>

                                               </section>
                                             
                                               <section class="post-footer">
                                                   <div class="row">
                                                   <div class="col-md-12">
                                                        <ul class="list-unstyled">
                                                            <li><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>
                                                            <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>
                                                            <li><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
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
                                                                  <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="32" height="32" alt="...">
                                                                </a>
                                                              </div>
                                                              <div class="media-body">
                                                                <a href="#" class="anchor-username"><h4 class="media-heading">{{ $user->firstname }}</h4></a> 
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
                         <button type="button" class="btn btn-link">|</button>
                         <button type="button" class="btn btn-link">Job post</button>
                         <button type="button" class="btn btn-link">|</button>
                         <button type="button" class="btn btn-link">Activity </button>
                      </div>
                  </div>

                  <form  method="post" action="{{ route('profile.store')  }}">
                        {{ csrf_field() }}
                  <input type="hidden" name="_method" value="post">
                  <div class="modal-body">
                  <div class="form-group">
                    <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something" name="description"></textarea>
                  </div>
                  </div>

                  <div class="modal-footer">
                      
                       <div class="form-group">
                           
                                <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle pull-right" type="button" data-toggle="dropdown" 
                                        style="margin-left:10px;" >Visibility
                                        <span class="caret"></span></button>
                                        
                                            <ul class="dropdown-menu pull-right" style="padding-left:10px ;" required>
                                            
                                                
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="type[]" value="{{$interest->profession}}">
                                                         {{$interest->profession}}</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="type[]" value="{{$interest->industry}}">
                                                        {{$interest->industry}}</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="type[]" value="{{$user->education}}"> 
                                                        {{$user->education}}</label>
                                                    </div>
                                                   
                                                

                                            </ul>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">submit</button>
                            
                        </div>
                
                      <ul class="nav nav-pills pull-left">
                          <li id="tooltip">
                             <a href="#">
                               <i class="fa fa-map-marker" >
                                 <span id="tooltiptext">Check-in</span>
                               </i>
                             </a>
                          </li>
                          <li id="tooltip">
                             <a href="#">
                               <i class="fa fa-camera" >
                                 <span id="tooltiptext">Upload image</span>
                               </i>
                             </a>
                          </li>
                          <li id="tooltip">
                             <a href="#">
                               <i class="fa fa-film" >
                                 <span id="tooltiptext">Upload video</span>
                               </i>
                             </a>
                          </li>
                          <li id="tooltip">
                             <a href="#">
                               <i class="fa fa-microphone" >
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

        


<script type = "text/javascript">
    document.getElementById("theform").style.display = "none";
     function showForm() {
     document.getElementById("Updateimage").style.display = "none";
     document.getElementById("theform").style.display = "block";
}
</script>

<script type = "text/javascript">
   document.getElementById("theform1").style.display = "none";
   function showForm1() {
     document.getElementById("Updateprofile").style.display = "none";
     document.getElementById("theform1").style.display = "block";
     }
</script>



@endsection
