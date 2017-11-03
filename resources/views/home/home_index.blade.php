@extends('layouts.app') @section('content')
<!--style-->
<style>

</style>

<!--End Style-->
<!--Main content-->
<div class="container">
    <div class="row">
        <!--side bar content-->

        <div class="col-md-2 col-sm-3 bg-light sidebar">
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
                                <textarea class="form-control  p-text-area" rows="2" placeholder="Write something"></textarea>
                            </div>
                            <div class="panel-heading">
                                <div class="btn-group btn-group-md">
                                    <button type="button" class="btn btn-primary">Photo/File</button>
                                </div>
                            </div>
                        </div>
                     </div>

                        <!--postshow-->
                        
                        @foreach($post as $post) 
                                      <div class="col-md-7">
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
                                                       
                                                                <a href="#" class="anchor-time">{{ $post->created_at }}</a>
                                                              </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>             
                                               </section>
                                               <section class="post-body">
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
                                    </div>

                               
                                @endforeach


                        <!--end post show-->
                    
                     <!--post body end-->

            </div>
           
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
                    <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something" name="description" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                      
                       <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary pull-right">Post</button>
                                <button type="button" class="btn btn-primary"style="margin-right:10px;"> Visibility </button>
                            
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