@extends('layouts.app')

@section('page-title')
    Home
@endsection
 @section('content')
<!--style-->
<style>

</style>
<!--script-->
<!--end script -->
<!--End Style-->
<!--Main content-->
<div class="container">
  <div class="row content">
    <!--side bar content-->

    <div class="col-md-3 col-sm-3 bg-light sidebar">
      <nav class="nav-sidebar">
        <div class="collapse navbar-collapse" id="side-navbar-collapse">
          <ul class="nav">
            <li  >
            <!--profile button-->
              <div class="media button_profile button_m " id="bp">
                    <a href="{{ url('profile') }}">
                        <div class="media-left "><img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}"
                              width="20" height="20" alt="..."></div>
                        <div class="media-body" data-toggle="tooltip" data-placement="bottom" title="{{$user->firstname }} {{$user->lastname }}" >
                            <h5 class="media-heading"> {{$user->firstname }} {{$user->lastname }}</h5>
                        </div>
                    </a>
              </div>
              <!--end profile button-->
                
            </li>
            <br>
              <form  action="{{ route('home.index')}}" >
               {{csrf_field()}}
               <button type="submit" class="button_connection button_m btn" id="bm" name="connection"  value="{{$interest->profession}}"
               data-toggle="tooltip" data-placement="bottom" title="{{$interest->profession}}">
               <i class="fa fa-briefcase" aria-hidden="true"></i></i> {{$interest->profession}}</button><br>
                
                <button type="submit" class="button_connection button_m  btn" id="bm1" name="connection" value="{{$interest->industry}}"
                data-toggle="tooltip" data-placement="bottom" title="{{$interest->industry}}">
                <i class="fa fa-industry" aria-hidden="true"></i> {{$interest->industry}}</button><br>

                <button type="submit" class="button_connection button_m  btn" id="bm2" name="connection" value="{{$user->education}}"
                data-toggle="tooltip" data-placement="bottom" title="{{$user->education}}">
                <i class="fa fa-university" aria-hidden="true"></i> {{$user->education}}</button><br>
              </form>
            
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
    <div class="col-md-7 col-sm-7 col-lg-7 show_home_post" id="h_post">
      <div class="panel panel-default" data-toggle="modal" data-target="#myModal" style="background-color: white; border-width:5px;border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
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
           
          </div>
        </div>
      </div>
      <!--postshow-->
      @if($posts!=null) 
      @foreach($posts as $userpost)
      <div class="panel panel-default">
        <div class="panel-body">
          <section class="post-heading">
            <div class="row">
              <div class="col-md-12">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$userpost['p_pic']}}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                   @if($userpost['user_id'] == Auth::user()->id)
                    <div class="dropdown ">
                      <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                      </button>
                      
                        <ul class="dropdown-menu pull-right">
                          <li><a href="#" 
                            onclick="
                             var result = confirm('Are you sure you with to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form').submit();
                              }
                                    " 
                                     >

                                     Delete

                          </a>
                          
                          <form id="delete-form" action="{{ route('post.destroy', $userpost['post_id']) }}" method="POST" style="display:none;">
                             <input type="hidden" name="_method" value="delete">
                             {{ csrf_field() }}
                          </form>

                          </li>
                        </ul>
                      
                    </div>
                    @endif

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$userpost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $userpost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-sm " style="background-color: #EEEEEE; border-radius: 4px;  ">
          
              <div class=" row">
                  <div class="col-md-12">
                    <div class="well well-sm">
                    <p style="font-size:18px;font-weight:400;">{{ $userpost['description'] }} </p>
                      </div>
                  </div>
                </div>  
            <!--project show-->
            @if($userpost['post_type']=="project")
            <h4>URL :</h4>
              <div class=" row">
                <div class="col-md-12">
                  <div class="well well-md">
                    <a href="{{ $userpost['url'] }} "> {{ $userpost['url'] }}</a>
                    </div>
                </div>
              </div>
            @endif
            <!-- end project show-->
                            <!--image show-->
                            @foreach($images as $imgpost)
                            @if( $userpost['post_id']==$imgpost->post_id)
                               <h4>Project Images : </h4>
                                  <div class=" row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="well well-sm">
                                          
                                                  @foreach($images as $imagepost)
                                                    @if( $userpost['post_id']==$imagepost->post_id)
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
          <hr>
          <section class="post-footer">
            <div class="row">
              <div class="col-md-12">
                <ul class="list-unstyled">
                  <li>
                  <!-- Shows Rate text and icon if post type is Project-->
                    @if($userpost['post_type']=="project")
                                   <!--<a href="#" data-toggle="modal" data-target="#starModal"><i class="glyphicon glyphicon-star"></i>Rate</a>-->
                                   <div class="HeaderBarThreshold" onclick=()>
                                   <form method="post" action="{{ route('rating.store') }}" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="post_id" value="{{$userpost['post_id']}}">
                           
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
                                        
                                          <strong></strong>
                               
                                          </form>
                                            
                              </div>
                    @else
                      <a href="#" ><i class="glyphicon glyphicon-thumbs-up"></i> Like</a>
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
                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$userpost['p_pic']}}"
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
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$useravailablepost['p_pic']}}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">

                   @if($useravailablepost['user_id'] == Auth::user()->id)
                     <div class="dropdown ">
                        <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                        </button>
                        <ul class="dropdown-menu pull-right">
                          <li>

                          <a href="#" 
                            onclick="
                             var result = confirm('Are you sure you with to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form').submit();
                              }
                                    " 
                                     >

                                     Delete

                          </a>
                          
                          <form id="delete-form" action="{{ route('availableforjob.destroy', $useravailablepost['id']) }}" method="POST" style="display:none;">
                             <input type="hidden" name="_method" value="delete">
                             {{ csrf_field() }}
                          </form>

                          </li>
                        </ul>
                    </div>
                    @endif

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$useravailablepost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $useravailablepost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-lg" style="background-color: #D7CCC8; border-radius: 4px;">
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
          <hr>

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
                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $useravailablepost['p_pic'] }}"
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
                      <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $jobpost['p_pic'] }}"
                        width="40" height="40" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                  @if($jobpost['user_id'] == Auth::user()->id)
                    <div class="dropdown ">
                        <button class="glyphicon glyphicon-chevron-down pull-right dropdown-toggle" type="button" data-toggle="dropdown">
                        </button>
                        <ul class="dropdown-menu pull-right">
                          <li><a href="#" 
                            onclick="
                             var result = confirm('Are you sure you with to delete this post?');
                             
                             if( result){
                               event.preventDefault();
                               document.getElementById('delete-form').submit();
                              }
                                    " 
                                     >

                                     Delete

                          </a>
                          
                          <form id="delete-form" action="{{ route('jobpost.destroy', $jobpost['id']) }}" method="POST" style="display:none;">
                             <input type="hidden" name="_method" value="delete">
                             {{ csrf_field() }}
                          </form>

                          </li>
                        </ul>
                    </div>
                    @endif

                    <a href="#" class="anchor-username">
                      <h4 class="media-heading"> {{$jobpost['firstname']}}</h4>
                    </a>

                    <a href="#" class="anchor-time">{{ $jobpost['created_at'] }}</a>
                  </div>
                </div>
              </div>

            </div>
          </section>
          <section class="post-body well well-lg" style="background-color: #CFD8DC; border-radius: 4px;">
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
           <hr>
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
                          <img class="media-object photo-profile img-circle" src="/uploads/profile/{{ $jobpost['p_pic'] }}"
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
          <form enctype="multipart/form-data" method="post" action="{{ route('post.store') }}" >
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
                <input id="url" class="form-control input-lg p-text-area"  placeholder="URL" name="url"
                  style="resize: none;" required >
            </div>

            <div class="form-group col-md-12" >
                <p id="show_imageFields" style="font-weight:700;"> </p>
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

    <!--end Modal-->
  </div>
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

                  //image show while select
                  $('input[type="file"]').change(function(e){
                    
                    var fileName = e.target.files;
                    $('#show_imageFields').html(fileName.length +" Images Selected");
                    /*for(var i=0;i<fileName.length;i++){
                      console.log(fileName[i].name);
                    }*/
                  });
                //end image show while select
               
                
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

                

                 function upload_image(){
                  document.getElementById('my_images').click();
                }

                 $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();   
                });
                  
                  
                  //sidebar button style
                      $(function() {
                        $(window).resize(function () {
                          if (window.innerWidth <1022) {
                            $("#h_post").removeClass("show_home_post");
                            $("#bp").removeClass("button_m");
                            $("#bm").removeClass("button_m");
                            $("#bm1").removeClass("button_m");
                            $("#bm2").removeClass("button_m");
                          // $("#bp").removeClass("button_profile");
                            
                          }
                        });
                      });
                //end sidebar style
             
</script>

@endsection
