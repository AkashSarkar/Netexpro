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
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                         <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="{{ url('home') }}">Home</a></li>


                                     <li><a href="" data-toggle="modal" data-target="#jobModal">Jobs</a></li>

                                     
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->firstname }}<span class="caret"></span></a>
                                         <ul class="dropdown-menu">                                        
                                             <li><a href="{{ url('profile') }}">Profile</a></li>
                                             <li><a href="#">Update</a></li>
                                             <li><a href="#">Delete</a></li>
                                         </ul>
                                      </li>
                                  
                                    
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
        
         <div class="container">

            @include('partials.errors')
            @include('partials.success')
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>


            <!-- Modal -->
<div id="jobModal" class="modal fade" role="dialog" style="margin-top:10%;">
  <div class="modal-dialog">

    <!-- Modal content-->
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
               ?>

        <form class="form-horizontal"  method="post" action="">
                        {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">

          <!--<div class="container">-->
                <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>
                   <div class="col-md-6">
                        <select class="form-control" name="profession"  value="{{ old('profession') }}">
                            <span class="caret"></span>
                            @foreach( $professions as $profession)
                            <option>{{ $profession }}</option>
                            @endforeach
                        </select>
                   </div><!--End of col-md-6-->

                    <label for="location" class="col-md-4 control-label">Prefered Location<span class="required">*</span></label>
                      <div class="col-md-6">
                        <select class="form-control" name="location"  value="{{ old('location') }}">
                            <span class="caret"></span>
                            @foreach( $locations as $location)
                            <option>{{ $location }}</option>
                            @endforeach
                        </select>
                      </div>


                      <div class="form-group">
                            <label for="CV" class="col-md-4 control-label">CV <span class="required">*</span></label>

                            <div class="col-md-6">
                                <input placeholder="attach cv" id="cv" type="text" class="form-control" 
                                name="CV" value=""  autofocus  style="width:110px;">
                            </div>
                        </div>

        </form><!--End of form-->
    </div><!--End of modal body-->

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
    </div><!--End of footer-->

      </div><!--End of modal content-->
  </div><!--End of modal-dialog-->
</div><!--End of modal fade-->

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

        <form class="form-horizontal"  method="post" action="">
                        {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">

          <!--<div class="container">-->
                <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>
                   <div class="col-md-6">
                        <select class="form-control" name="profession"  value="{{ old('profession') }}">
                            <span class="caret"></span>
                            @foreach( $professions as $profession)
                            <option>{{ $profession }}</option>
                            @endforeach
                        </select>
                   </div><!--End of col-md-6-->

                    <label for="$position" class="col-md-4 control-label">Positions<span class="required">*</span></label>
                      <div class="col-md-6">
                        <select class="form-control" name="$position"  value="{{ old('$position') }}">
                            <span class="caret"></span>
                            @foreach( $positions as $position)
                            <option>{{ $position }}</option>
                            @endforeach
                        </select>
                      </div>

                      <label for="location" class="col-md-4 control-label">Prefered Location<span class="required">*</span></label>
                      <div class="col-md-6">
                        <select class="form-control" name="location"  value="{{ old('location') }}">
                            <span class="caret"></span>
                            @foreach( $locations as $location)
                            <option>{{ $location }}</option>
                            @endforeach
                        </select>
                      </div>


                      <div class="form-group">
                            <label for="Description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input placeholder="Optional" id="Description" type="text" class="form-control" 
                                name="Description" value=""  autofocus  style="width:110px;">
                            </div>
                        </div>

        </form><!--End of form-->
    </div><!--End of modal body-->

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
    </div><!--End of footer-->
    
      </div><!--End of modal content-->
  </div><!--End of modal-dialog-->
</div><!--End of modal fade-->

<script type="text/javascript">
    $(document).ready(function(){
        $("input[name='job_post_option']").click(function(){
            var radioValue = $("input[name='job_post_option']:checked").val();
            if(radioValue==1){
                setTimeout($('#jobModal').modal('hide'), 10000000);
                setTimeout($('#available_job_modal').modal('show'), 10000000);
            }


            if(radioValue==2){
                setTimeout($('#jobModal').modal('hide'), 10000000);
                setTimeout($('#want_to_hire_modal').modal('show'), 10000000);
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
