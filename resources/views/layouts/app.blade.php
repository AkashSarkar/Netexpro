<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/profilestyle.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/tooltip_style.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/post_rating.css') }}" rel='stylesheet' type='text/css'>
    <!--profile_style-->
    <link href="{{ asset('css/post_style.css') }}" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="js/bootstrap.js"></script>
    <script src="https://use.fontawesome.com/874dbadbd7.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    
    <!-- End of Styles -->
 <!--gallery modal -->
 <!--gallery modal online script-->
<style>
.img-modal {
  display: block;
}

.img-modal .modal-dialog {
    /* An arbitrary minimum height. Feel free to modify this one as well */
    min-height: 350px;
    height: 80%;
}

.img-modal .modal-content, .img-modal .modal-body, .img-modal .row, .img-modal .modal-image {
    height: 100%;
}

.modal-content {
    border-radius: 0;
}

.modal-body {
    padding-top: 0;
    padding-bottom: 0;
}

.modal-image {
    background: #000;
    padding :0;
}

.modal-image img {
    margin: 0 auto;
    max-height: 100%;
    max-width: 100%;
    
    position: relative;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.img-modal .img-modal-btn {
    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    background: black;
    opacity: 0;
    font-size: 1.5em;
    width: 45px;
    color: #fff;
    transition: opacity .2s ease-in;
}

.img-modal .modal-image:hover .img-modal-btn {
    opacity: 0.4;  
}

.img-modal .modal-image:hover .img-modal-btn:hover {
   opacity: 0.75;   
}

.img-modal .img-modal-btn.right {
    right: 0;
}

.img-modal .img-modal-btn i {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    margin-top: -.75em;
}

.img-modal .modal-meta {
    position: relative;   
    height: 100%;
}

.img-modal .modal-meta-top {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 45px;
    padding: 5px 10px;
    overflow-y: auto;
}

.img-modal .modal-meta-top .img-poster img {
    height: 70px;
    width: 70px;
    float: left;
    margin-right: 15px;
}

.img-modal .modal-meta-top .img-poster strong {
    display: block; 
    padding-top: 15px;
}

.img-modal .modal-meta-top .img-poster span {
    display: block;   
    color: #aaa;
    font-size:.9em;
}

.img-modal .modal-meta-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 5px;
    border-top: solid 1px #ccc;
}

.img-modal .img-comment-list {
    list-style: none;  
    padding: 0;
}
.img-modal .img-comment-list li {
    margin:0;
    margin-top:10px;
}

.img-modal .img-comment-list li > div {
    display:table-cell;
}

.img-modal .img-comment-list img {
    border-radius:50%;
    width: 42px;
    height: 42px;
    margin-right: 10px;
    margin-top: 20px;
}

.img-modal .img-comment-list p {
    margin: 0;
}

.img-modal .img-comment-list span {
    font-size: .8em; 
    color: #aaa;
}

@media only screen and (max-width : 992px) {
    .modal-content {
        border-radius: 0;
        max-height: 100%;
        overflow-y: auto;
    }
    
    .img-modal .modal-image {
        height: calc(100% - 100px);
    }
    
    .img-modal .modal-meta {
        height: auto;
    }
    
    .img-modal .modal-meta-top {
        position: static;
        padding-top: 15px;
    }
    
    .img-modal .modal-meta-bottom {
        position: static;
        margin: 0 -15px;
    }
}
</style>
    <!--end gallery modal-->


</head>

<body style="background-color:#DAD8D8">
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                  <div class="navbar-header">

                      <!-- Collapsed Hamburger -->
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#side-navbar-collapse" aria-expanded="false">
                          <span class="sr-only">Toggle Navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>

                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                          <span class="sr-only">Toggle Navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>

                      <!-- Branding Image -->
                      <a class="navbar-brand" href="{{ url('home') }}">
                         Netexpro
                      </a>

                 </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                      &nbsp;
                  </ul>

                  <!-- Right Side Of Navbar -->
                   
                  <!-- Authentication Links -->
                  @guest
                   <ul class="nav navbar-nav navbar-right">
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                  </ul>
                  
                  @else

                  <!-- Search bar on nav bar -->
                  <form class="navbar-form navbar-left">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                              <div class="input-group-btn">
                                  <button class="btn btn-default" type="submit">
                                   <i class="glyphicon glyphicon-search"></i>
                                  </button>
                              </div>
                         </div>
                  </form>

                      <!--Start navbar right list elements -->
                      <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('home') }}">Home</a></li>
                            <li><a href="" data-toggle="modal" data-target="#jobModal">Jobs</a></li>
                            <li><a href="{{ url('profile') }}">{{ Auth::user()->firstname }}</a></li>
                                            
                            <li class="dropdown">
                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   <i class="fa fa-cogs" aria-hidden="true"></i><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
        
         <div class="container" >

            @include('partials.errors')
            @include('partials.success')

            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>


  <!--First Job Modal -->
  <div id="jobModal" class="modal fade" role="dialog" style="margin-top:10%;">
    <div class="modal-dialog">

      <!--Job Modal content-->
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>

          <div class="modal-body">
            <p> 
              <label><input type="radio" name="job_post_option" value="1">Available for job</label> 
              <br>
              <label><input type="radio" name="job_post_option" value="2">Want to hire</label>
            </p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>

      </div>

    </div>
  </div>




<!-- If available for job is selected -->
<div id="available_job_modal" class="modal fade" role="dialog" style="margin-top:10%;">
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Available for job =><strong>Enter Info here</strong></h4>
          </div>

        <div class="modal-body">
               <?php
                  $professions = array(
                      "CSE",
                      "EEE",
                      "BBA",
                      "MBA",
                      "MSCSE"
                  );

                  $locations = array(
                    "Dhaka",
                    "Chittagong",
                    "Comilla",
                    "Sylhet",
                    "Rangpur"
                );

                   $positions = array(
                    "Manager",
                    "HR",
                    "Executive"  
                 );
               ?>
                  <form class="form-horizontal"  method="post" action="{{ route('availableforjob.store') }}" enctype="multipart/form-data">
               
                                {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">


                        
                        <!--Position start -->
                        <div class="form-group">
                        <label for="position" class="col-md-4 control-label">Preferred Job Position<span class="required">*</span></label>
                               <div class="col-md-6" >
                                    <select class="form-control" name="position"  value="{{ old('position') }}" >
                                        <span class="caret"></span>
                                        @foreach( $positions as $position)
                                        <option>{{ $position }}</option>
                                        @endforeach
                                    </select>
                               </div>
                        </div>       
                        <!--Position end -->
                      
                       
                        <!--Profession start -->
                        <div class="form-group">
                        <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>
                               <div class="col-md-6">
                                    <select class="form-control" name="profession"  value="{{ old('profession') }}">
                                        <span class="caret"></span>
                                        @foreach( $professions as $profession)
                                        <option>{{ $profession }}</option>
                                        @endforeach
                                    </select>
                               </div><!--End of col-md-6-->
                        </div>       
                        <!--Profession end -->
                               
                        
                        <!--cv start -->
                        <div class="form-group">
                              <label for="CV" class="col-md-4 control-label">CV <span class="required">*</span></label>
                              <div class="col-md-6">
                                <input type="file" name="attachment" required>
                                <h6>(Maximum 2MB)*</h6>
                              </div>
                        </div>
                        <!--cv end-->
                               
                        
                        <!-- highlight start-->
                        <div class="form-group">
                                <label for="highlight" class="col-md-4 control-label">Highlight </label>

                                <div class="col-md-6">
                                    <input placeholder="anything to highlight??" id="highlight" type="text" class="form-control" 
                                    name="highlight" value=""  autofocus  style="width:110px;">
                                </div>
                        </div>
                        <!--highlight end-->

                               
                        <!--location start-->
                        <div class="form-group">
                        <label for="location" class="col-md-4 control-label">Prefered Location<span class="required">*</span></label>
                              <div class="col-md-6">
                                    <select class="form-control" name="location"  value="{{ old('location') }}">
                                        <span class="caret"></span>
                                        @foreach( $locations as $location)
                                        <option>{{ $location }}</option>
                                        @endforeach
                                    </select>
                              </div>
                          </div>
                        <!--location end-->

                                  
                          

          </div><!--Available for job End of modal body-->

                    <div class="modal-footer">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                           <button type="submit" class="btn btn-primary">
                             Done
                           </button>
                        </div>
                    </div>
                   

                </form><!--Available for job End of form-->
      </div><!--Available for job End of modal content-->
  </div><!--Available for job End of modal-dialog-->
</div><!--Available for job End of modal fade-->



<!-- If want to hire is selected -->
<div id="want_to_hire_modal" class="modal fade" role="dialog" style="margin-top:10%;">
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Want to hire ><strong>Enter Info here</strong></h4>
          </div>
        <div class="modal-body">
               <?php
                  $professions = array(
                      "CSE",
                      "EEE",
                      "BBA",
                      "MBA",
                      "MSCSE"
                  );

                  $locations = array(
                    "Dhaka",
                    "Chittagong",
                    "Comilla",
                    "Sylhet",
                    "Rangpur"
                 );

                 $positions = array(
                    "Manager",
                    "HR",
                    "Executive"  
                 );
               ?>

          <form class="form-horizontal"  method="post" action="{{ route('jobpost.store') }}">
                            {{ csrf_field() }}
              <input type="hidden" name="_method" value="post">


                          <!-- Position start --> 
                          <div class="form-group">
                          <label for="position" class="col-md-4 control-label">Available Job Position<span class="required">*</span></label>
                            <div class="col-md-6">
                                 <select class="form-control" name="position"  value="{{ old('position') }}">
                                     <span class="caret"></span>
                                     @foreach( $positions as $position)
                                     <option>{{ $position }}</option>
                                     @endforeach
                                 </select>
                            </div>
                          </div>
                          <!-- Position end -->
             
                          
                          <!-- Profession start -->
                          <div class="form-group">
                          <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>
                             <div class="col-md-6">
                                  <select class="form-control" name="profession"  value="{{ old('profession') }}">
                                      <span class="caret"></span>
                                      @foreach( $professions as $profession)
                                      <option>{{ $profession }}</option>
                                      @endforeach
                                  </select>
                             </div>
                          </div>
                          <!-- Profession end -->
              
                   
     
                          <!-- Vacancy number start -->
                          <div class="form-group">
                                <label for="vacancy_number" class="col-md-4 control-label">No. of Vacancy</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="vacancy_number" type="text" class="form-control" 
                                    name="vacancy_number" value=""  autofocus  style="width:110px;">
                                </div>
                          </div>
                          <!-- Vacancy number end -->
       
                          
                          <!-- Circular(longblob or hyperlink type) start-->
                          <div class="form-group">
                              <label for="circular" class="col-md-4 control-label">Circular</label>

                              <div class="col-md-6">
                                  <input placeholder="" id="circular" type="text" class="form-control" 
                                  name="circular" value=""  autofocus  style="width:110px;">
                              </div>
                          </div>
                          <!-- Circular end -->

                          
                          <!-- company details start -->
                          <div class="form-group">
                                <label for="company_details" class="col-md-4 control-label">Company Details</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="company_details" type="text" class="form-control" 
                                    name="company_details" value=""  autofocus  style="width:110px;">
                                </div>
                            </div>
                          <!-- company details end -->
                            
                         
                          <!-- Job details start -->
                          <div class="form-group">
                                <label for="job_details" class="col-md-4 control-label">Job Details</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="job_details" type="text" class="form-control" 
                                    name="job_details" value=""  autofocus  style="width:110px;">
                                </div>
                          </div>
                          <!-- job details end -->
                            
                          
                          <!-- Location start -->
                          <div class="form-group">
                          <label for="location" class="col-md-4 control-label">Prefered Location<span class="required">*</span></label>
                            <div class="col-md-6">
                                  <select class="form-control" name="location"  value="{{ old('location') }}">
                                      <span class="caret"></span>
                                      @foreach( $locations as $location)
                                      <option>{{ $location }}</option>
                                      @endforeach
                                  </select>
                            </div>
                            </div>
                          <!-- Location end -->

                     

            
               
                     </div><!--Hire for job End of modal body-->
                    <!--<div class="modal-footer">-->
                    <!--  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>-->
                    <div class="modal-footer">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                           <button type="submit" class="btn btn-primary">
                             Done
                           </button>
                        </div>
                    </div>
                  </div><!-- Hire for job End of footer-->
         
            </form><!-- Hire for job End of form-->    
      </div><!--Hire for job End of modal content-->
   </div><!--Hire for job End of modal-dialog-->
</div><!--Hire for job End of modal fade-->






<script type="text/javascript">
$(function(){
     $(".img-modal-btn.right").on('click', function(e){
        e.preventDefault();
        cur = $(this).parent().find('img:visible()');
        next = cur.next('img');
        par = cur.parent();
        if (!next.length) { next = $(cur.parent().find("img").get(0)) }
        cur.addClass('hidden');
        next.removeClass('hidden');
        
        return false;
    })
    
    $(".img-modal-btn.left").on('click', function(e){
        e.preventDefault();
        cur = $(this).parent().find('img:visible()');
        next = cur.prev('img');
        par = cur.parent();
        children = cur.parent().find("img");
        if (!next.length) { next = $(children.get(children.length-1)) }
        cur.addClass('hidden');
        next.removeClass('hidden');
        
        return false;
    })

});
    $(document).ready(function(){
        $("input[name='job_post_option']").click(function(){
            var radioValue = $("input[name='job_post_option']:checked").val();
            if(radioValue==1){
                //setTimeout($('#jobModal').modal('hide'), 10000000);
               $('#jobModal').modal('hide');
               $('#available_job_modal').modal('show');
            }


            if(radioValue==2){
                //setTimeout($('#jobModal').modal('hide'), 10000000);
                $('#jobModal').modal('hide');
                $('#want_to_hire_modal').modal('show');

            }
        });
        
    });
</script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- End of import Scripts -->

    <script src="js/select2.min.js"></script>
    <script>
        $(function() {
            $('select').select2();
        })
        
    </script>
</body>
</html>
