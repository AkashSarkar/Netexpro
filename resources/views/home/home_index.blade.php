@extends('layouts.app') @section('content')
<!--style-->
<style>

</style>

<!--End Style-->
<!--Main content-->
<div class="container">
  <div class="row content">
    <!--side bar content-->

    <div class="col-md-2 col-sm-2 bg-light sidebar">
      <nav class="nav-sidebar">
        <div class="collapse navbar-collapse" id="side-navbar-collapse">
          <ul class="nav">
            <li class="active">
              <a href="/home">Home</a>
            </li>
              <form  action="{{ route('home.index')}}" >
               {{csrf_field()}}
               <button type="submit" name="connection"  value="{{$interest->profession}}"> {{$interest->profession}}</button><br>
                
                <button type="submit" name="connection" value="{{$interest->industry}}"> {{$interest->industry}}</button><br>
                <button type="submit" name="connection" value="{{$user->education}}"> {{$user->education}}</button><br>
              </form>
            <li>
              <a href="javascript:;">
                <i class="glyphicon glyphicon-off"></i> Sign out</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <!--<script type="text/javascript">
      
      $(document).ready(function(){
          $("input[name='connection']").click(function(){
              var radioValue = $("input[name='connection']:checked").val();
              console.log(radioValue);

              $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/home",
                data:{
                  'con':radioValue
                },
                success: function( response ) {
                  
                  console.log(response); 
                },
               error: function(response){
                 alert('Error'+response);
                 }
               });
          });
          
      });
  </script>-->


    <!--end side bar-->

    <!--post body-->
    <div class="col-md-7 col-sm-7 col-lg-7">
      <div class="panel panel-default" data-toggle="modal" data-target="#myModal">
        <div class="panel-heading">
          <div class="btn-group btn-group-md">
            <button type="button" class="btn btn-link">Make post</button>
          </div>
        </div>
        <div class="panel-body">
          <textarea class="form-control  p-text-area" rows="2" placeholder="Write something" style="resize: none;"></textarea>
        </div>
        <div class="panel-heading">
          <div class="btn-group btn-group-md">
            <button type="button" class="btn btn-primary">Photo/File</button>
          </div>
        </div>
      </div>
      <!--postshow-->
      @if($posts!=null) @foreach($posts as $userpost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $user->p_pic }}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#">
                      <i class="glyphicon glyphicon-chevron-down pull-right"></i>
                    </a>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$userpost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $userpost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body" style="background-color: #f2f4f7; border-radius: 10px;  padding: 10px">
            <p>{{ $userpost['description'] }}
              <hr>
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
                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $user->p_pic }}"
                            width="32" height="32" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <a href="#" class="anchor-username">
                          <h4 class="media-heading">{{ $userpost['firstname'] }}</h4>
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
      @endforeach @endif
      <!--end post show-->

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
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $user->p_pic }}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#">
                      <i class="glyphicon glyphicon-chevron-down pull-right"></i>
                    </a>

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$useravailablepost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $useravailablepost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body" style="background-color: #ded5e0; border-radius: 10px; border-style: inset; padding: 10px">
            <h4 style="font-weight:bold;">******job seeking post******</h4>
            <p>
              <li>Position :
                <strong>{{ $useravailablepost['position'] }}</strong>
              </li>
            </p>
            <p>
              <li>Profession :
                <strong>{{ $useravailablepost['profession'] }}</strong>
              </li>
            </p>
            <p>
              <li>Preferred Job Location :
                <strong>{{ $useravailablepost['location'] }}</strong>
              </li>
            </p>
            <p>
              <li>Highlights(Any specified course/skills) :
                <strong>{{ $useravailablepost['highlight'] }}</strong>
              </li>
            </p>
            <li>
              <a target="_blank" href="/uploads/attachment/{{$useravailablepost['CV']}}">Download CV from here..</a>
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
                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $user->p_pic }}"
                            width="32" height="32" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                        <a href="#" class="anchor-username">
                          <h4 class="media-heading">{{ $useravailablepost['firstname'] }}</h4>
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


      <!--job hiring post show-->

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
                      <h4 class="media-heading"> {{$jobpost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $jobpost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body" style="background-color: #d4fcbd; border-radius: 10px; border-style: outset; padding: 10px">
            <h4 style="font-weight:bold;">******Hiring post******</h4>
            <p>
              <li>Position :
                <strong>{{ $jobpost['position'] }}</strong>
              </li>
            </p>
            <p>
              <li>Profession :
                <strong>{{ $jobpost['profession'] }}</strong>
              </li>
            </p>
            <p>
              <li>No. of Vacancy :
                <strong>{{ $jobpost['vacancy_number'] }}</strong>
              </li>
            </p>
            <p>
              <li>Job Circular:
                <strong>{{ $jobpost['circular'] }}</strong>
              </li>
            </p>
            <p>
              <li>Company Details:
                <strong>{{ $jobpost['company_details'] }}</strong>
              </li>
            </p>
            <p>
              <li>Job Responsibilities:
                <strong>{{ $jobpost['job_details'] }}</strong>
              </li>
            </p>
            <p>
              <li>Job Location :
                <strong>{{ $jobpost['location'] }}</strong>
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
                          <h4 class="media-heading">{{ $jobpost['firstname'] }}</h4>
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
      <!--end of job hiring post show-->

    </div>
    <!--post body end-->

    <!--modal-->
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
          <form method="post" action="{{ route('post.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="post">
            <div class="modal-body row">
            <div class="col-md-12">
                                Post type : 
                                <input type="radio"  name="post_type" value="status" checked>  Status
                                <input type="radio"  name="post_type" value="project">  Project

                                @if ($errors->has('post_type'))
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
                <input  class="form-control input-lg p-text-area"  placeholder="URL" name="url"
                  style="resize: none;" required autofocus>
              </div>
             
            </div>

            <div class="modal-footer">

              <div class="form-group">

                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle pull-right" 
                    type="button" data-toggle="dropdown" style="margin-left:10px;">Visibility
                    <span class="caret"></span>
                  </button>
                    
                  <ul class="dropdown-menu pull-right" style="padding-left:10px ;" >


                    <div class="checkbox" >
                      <label>
                        <input type="checkbox" name="type[]" value="{{$interest->profession}}" required> {{$interest->profession}}
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type[]" value="{{$interest->industry}}" required> {{$interest->industry}}
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="type[]" value="{{$user->education}}" required> {{$user->education}}
                      </label>
                    </div>
                   
              <script type="text/javascript">
               //shows projects fields
                $(document).ready(function(){
                  $("#show_porjectFields").hide();
                   $("input[name='post_type']").click(function(){
                    var post_type=$("input[name='post_type']:checked").val();
                    if(post_type=="project")
                      $("#show_porjectFields").show();
                    else
                      $("#show_porjectFields").hide();
                  });
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


                  </ul>
                </div>

                <button type="submit" class="btn btn-primary pull-right" >Post</button>

                
              <span id="box"></span>
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

    <!--end Modal-->
  </div>
</div>
@endsection