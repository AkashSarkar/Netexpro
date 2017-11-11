<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netexpro</title>

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
                            <li class="active"><a href="{{ url('home') }}">Home</a></li>
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
