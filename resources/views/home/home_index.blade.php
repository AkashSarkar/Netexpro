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
                            <a href="javascript:;">Home</a>
                        </li>
                        <li>
                            <a href="javascript:;">About</a>
                        </li>
                        <li>
                            <a href="javascript:;">Products</a>
                        </li>
                        <li>
                            <a href="javascript:;">FAQ</a>
                        </li>
                        <li class="nav-divider"></li>
                        
                        
                        <li>
                            <a href="javascript:;">
                                <i class="glyphicon glyphicon-off"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>



                    <!--end side bar-->

                    <!--post body-->
                    <div class="col-md-7 col-sm-7 col-lg-7" >
                        <div class="panel panel-default" data-toggle="modal" data-target="#myModal">
                            <div class="panel-heading">
                                <div class="btn-group btn-group-md">
                                    <button type="button" class="btn btn-link">Make post</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <textarea class="form-control  p-text-area" rows="2" placeholder="Write something" disabled></textarea>
                            </div>
                            <div class="panel-heading">
                                <div class="btn-group btn-group-md">
                                    <button type="button" class="btn btn-primary">Photo/File</button>
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
                                                                  <img class="media-object photo-profile img-circle" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">
                                                                </a>
                                                              </div>
                                                              <div class="media-body">
                                                                    <a href="#"><i class="glyphicon glyphicon-chevron-down pull-right"></i></a>
                                                        
                                                                    <a href="#" class="anchor-username"><h4 class="media-heading"> {{$userpost['firstname']}}</h4></a>
                                                       
                                                                <a href="#" class="anchor-time">{{ $userpost['created_at'] }}</a>
                                                              </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>             
                                               </section>
                                               <section class="post-body">
                                                   <p>{{ $userpost['description'] }}<hr></p>
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
                                                                <a href="#" class="anchor-username"><h4 class="media-heading">{{ $userpost['firstname'] }}</h4></a> 
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
                        @endif
                        <!--end post show-->
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
                  <form  method="post" action="{{ route('post.store') }}">
                        {{ csrf_field() }}
                  <input type="hidden" name="_method" value="post">
                  <div class="modal-body">
                    <div class="form-group">
                    <textarea id="textareaID1" class="form-control input-lg p-text-area" rows="2" 
                    placeholder="Write something" name="description" autofocus required></textarea>
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

                                <button type="submit" class="btn btn-primary pull-right">Post</button>
                            
                        </div>
                      <ul class="nav nav-pills pull-left">
                          <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                          <li><a href="#"><i class="fa fa-camera"></i></a></li>
                          <li><a href="#"><i class=" fa fa-film"></i></a></li>
                          <li><a href="#"><i class="fa fa-microphone"></i></a></li>
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