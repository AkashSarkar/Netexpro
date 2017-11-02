@extends('layouts.app')

@section('content')
<!--style-->
<style>
</style>

<!--End Style-->
<!--Main content-->
  <div class="container">
      <div class="row" >
          <!--side bar content-->
        <nav class="col-md-2 col-sm-3 bg-light sidebar">
        <div class="collapse navbar-collapse " id="side-navbar-collapse" >
             <ul class="nav navbar-nav" >
                    &nbsp;
                 <li >
                    <a  href="#">Overview <span class="sr-only">(current)</span></a>
                 </li>
                 <li >
                    <a  href="#">Reports</a>
                 </li>
                 <li >
                   <a  href="#">Analytics</a>
                </li>
            </ul>
       
             

           <ul class="nav navbar-nav">
                    &nbsp;
              <li >
                  <a  href="#">Nav item</a>
             </li>
             <li >
                 <a  href="#">Nav item again</a>
             </li>
             <li c>
                <a  href="#">One more nav</a>
             </li>
             <li >
               <a  href="#">Another nav item</a>
             </li>
           </ul>
         

          <ul class="nav navbar-nav">
                    &nbsp;
             <li >
                <a  href="#">Nav item again</a>
             </li>
             <li >
               <a  href="#">One more nav</a>
            </li>
            <li >
                <a  href="#">Another nav item</a>
            </li>
          </ul>
         </div>
        </nav>
        <!--end side bar-->
        
                             <!--post body-->
  <div class="col-md-7 col-sm-7 col-lg-7"data-toggle="modal" data-target="#myModal">
        <div class="panel panel-default">
             <div class="panel-heading">
                 <div class="btn-group btn-group-md">
                     <button type="button" class="btn btn-link">Make post</button>
                     <button type="button" class="btn btn-link">|</button>
                     <button type="button" class="btn btn-link">Job post</button>                    
                 </div>
            </div>
            <div class="panel-body">
               <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something"></textarea>     
            </div>
            <div class="panel-heading">
                 <div class="btn-group btn-group-md">
                     <button type="button" class="btn btn-primary">Photo/File</button>
                 </div>
            </div>
          </div>
            </div>
           
        </div>
                              <!--post body end-->
        <!--Modal-->
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
                  <form method="post" action= "{{ route('posts.store',[Auth::user()->id]) }}"></form>
                    {{  csrf_field()  }}
                    <div class="form-group">
                     <div class="modal-body">
                    <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Write something" name="description" required></textarea>
                  </div>
                  <div class="modal-footer">
                
                                <div class="row">
                                <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Post
                                </button>
                            </div>
                        </div>
                                <div class="dropdown">
                                    <button class="btn btn-azure dropdown-toggle" type="button" data-toggle="dropdown">Visibility
                                    <span class="caret"></span></button>
                                    
                                        <ul class="dropdown-menu pull-right">
                                        
                                            <form style="padding-left: 10px">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="">Ridwana</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="">Deepita</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="">Akash</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="">Tanvir</label>
                                                </div>
                                            </form>

                                        </ul>
                                       
                                </div>
                               
                                </div>
                           

                     
                      <ul class="nav nav-pills pull-left">
                          <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                          <li><a href="#"><i class="fa fa-camera"></i></a></li>
                          <li><a href="#"><i class=" fa fa-film"></i></a></li>
                          <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                      </ul>
                </div>
                    


                     </div>
                  </form>

            </div>
            
          </div>
        </div>
        <!--end Modal-->
  </div>


  
@endsection
