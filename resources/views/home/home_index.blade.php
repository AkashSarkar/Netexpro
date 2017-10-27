@extends('layouts.app')

@section('content')
<!--style-->
<style>
</style>

<!--End Style-->
<!--Main content-->
<div class="container">
<div class="row">
<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar" id="side">
<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Analytics</a>
  </li>
</ul>
<br>
<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link" href="#">Nav item</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Nav item again</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">One more nav</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Another nav item</a>
  </li>
</ul>
<br>
<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link" href="#">Nav item again</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">One more nav</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Another nav item</a>
  </li>
</ul>
</nav>
  
  <div class="col-md-7 col-sm-7 col-lg-7"data-toggle="modal" data-target="#myModal">
        <div class="panel panel-default">
             <div class="panel-heading">
                 <div class="btn-group btn-group-md">
                     <button type="button" class="btn btn-link">Make post</button>
                     <button type="button" class="btn btn-link">|</button>
                     <button type="button" class="btn btn-link">Job post</button>
                     <button type="button" class="btn btn-link">|</button>
                     <button type="button" class="btn btn-link">Activity </button>
                 </div>
            </div>
            <div class="panel-body">
               <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something"></textarea>     
            </div>
            <div class="panel-heading">
                 <div class="btn-group btn-group-md">
                     <button type="button" class="btn btn-link">Make post</button>
                     <button type="button" class="btn btn-link">|</button>
                     <button type="button" class="btn btn-link">Job post</button>
                     <button type="button" class="btn btn-link">|</button>
                     <button type="button" class="btn btn-link">Activity </button>
                 </div>
            </div>
          </div>
            </div>
           
        </div>
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
                          <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                          <li><a href="#"><i class="fa fa-camera"></i></a></li>
                          <li><a href="#"><i class=" fa fa-film"></i></a></li>
                          <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                      </ul>
                </div>
            </div>
            
          </div>
        </div>
        <!--end Modal-->
  </div>


  
@endsection
