@extends('layouts.app')

@section('content')

<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1>Eli Macy</h1>
            <p>Girls just wanna go fun.</p>


<div class="row">
             <div class="col-md-4 col-sm-4 col-lg-4">
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
            </div>
            
           
          </div>
</div>

        </div>
    </div>


   <div class="col-md-7 col-sm-7 col-lg-7 pull-right" data-toggle="modal" data-target="#myModal">
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

</div> <!-- /container -->  


@endsection