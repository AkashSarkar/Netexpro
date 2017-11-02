@extends('layouts.app')

@section('content')


    <div class="fb-profile">
       <div>
        <img align="left" class="fb-image-lg" src="/uploads/avatars/{{ $user->avatar }}" alt="Profile image example" style="height:400px;width:100%;"/>
        <button id="Updateimage" type="button" class="btn btn-default btn-sm pull-right" style="margin-top:-40px; opacity: .5;" onclick="showForm()">
        <i class="fa fa-upload" aria-hidden="true">Change Cover Photo</i>
        </button>
        <div id="theform" class="pull-right" style="margin-top:-60px;opacity: 50;">
         <form enctype="multipart/form-data" action="/profile" method="POST">
              <!--  <label>Update Profile Image</label>-->
                <input type="file" name="avatar" style="
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
          <img align="left" class="fb-image-profile thumbnail" src="/uploads/avatars1/{{ $user->avatar1 }}" alt="Profile image example"/>
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
                <!--profile pic change-->
    <button id="Updateprofile" type="button" class="btn btn-default btn-sm" style="margin-left:-150px; margin-top:20px; opacity: .5;" onclick="showForm1()">
          <i class="fa fa-upload" aria-hidden="true">Change Profile Photo</i>
        </button>
          <div id="theform1">
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile</label>
                <input type="file" name="avatar1">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit">
              </form>
        </div>
        <!--End of profile pic change-->
            </div>


            
    </div>



     <div class="container">
          <div class="row" style="padding-top: 30px;">
           
               <div class="col-md-4 col-sm-12 col-lg-4 " style="background-color: #f2f2f2;"><a><i class="fa fa-pencil pull-right" data-toggle="modal" data-target="#personalInfoModal" style="margin-top: 10px;" aria-hidden="true" ></i></a>
                  
                  </br>
                  <p>Education: {{ $user->education }} </p>
                  <p>Email: {{ $user->email }} </p>
                  <p>Phone: {{ $user->phone_no }} </p>
                  <p>Sex: {{ $user->gender }} </p>
                  <p>Birth date: {{ $user->dob }} </p>
                  <p>Location: {{ $user->location }} </p>
                  <p>Availability: {{ $user->available_for_job }} </p>
                
               </div>
               
                 
      <!--Modal for user personal information-->
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
                        <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something"></textarea>     
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

          </div>

          <div class="row" style="margin-top:-10px;">
           <div class="col-md-4 col-sm-12 col-lg-4 " style="background-color: #f2f2f2;"><a href="/interests/{{$interest->id}}/edit"><i class="fa fa-pencil pull-right" style="margin-top: 10px;" aria-hidden="true" ></i></a>
                 </br>
                  <p>Profession: {{ $interest->profession }}</p>
                   
                  <p>Industry: {{ $interest->industry }} </p>
           </div>
            </div>
      </div>




      <!--Modal for post area start-->
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

                  <div class="modal-body">
                    <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something"></textarea>
                  </div>

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
