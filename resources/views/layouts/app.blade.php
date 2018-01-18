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
    <link href="{{ asset('css/comment_style.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/search_style.css') }}" rel='stylesheet' type='text/css'>
    <!--profile_style-->
    <link href="{{ asset('css/post_style.css') }}" rel='stylesheet' type='text/css'>

    
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/css/select2.css">
    <link rel="stylesheet" href="css/css/select2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <script src="js/bootstrap.js"></script>
    <script src="https://use.fontawesome.com/874dbadbd7.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
   
    <!-- End of Styles -->
    <!--gallery modal -->
    <!--gallery modal online script-->
    <style>
     
      .wrap{
         
          overflow-wrap: break-word;
  
         /* notification style for word break; */
            word-break: break-word;
            white-space:normal;
          
        }
  
        .img-modal {
            display: block;
        }

        .img-modal .modal-dialog {
            /* An arbitrary minimum height. Feel free to modify this one as well */
            min-height: 350px;
            height: 80%;
        }

        .img-modal .modal-content,
        .img-modal .modal-body,
        .img-modal .row,
        .img-modal .modal-image {
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
            padding: 0;
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
            font-size: .9em;
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
            margin: 0;
            margin-top: 10px;
        }

        .img-modal .img-comment-list li>div {
            display: table-cell;
        }

        .img-modal .img-comment-list img {
            border-radius: 50%;
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

        @media only screen and (max-width: 992px) {
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
                        <li>
                            <a href="{{ route('login') }}" >Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
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
                        <li>
                            <a href="{{ url('home') }}" ><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#jobModal"><i class="fa fa-briefcase" aria-hidden="true"></i> Job</a>
                        </li>
                        {{--notification dropdown--}}
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  data-toggle="tooltip" data-placement="bottom" title='See Notification'>
                              <i class="fas fa-bell fa-lg"></i>
                              <span class="badge" style="cursor:pointer;" data-toggle="tooltip" data-placement="bottom" title='Notification'>{{count(auth()->User()->unreadNotifications)}}</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                              
                                <li class="dropdown-header" style="">
                                   @foreach(auth()->User()->unreadNotifications as $notification)
                                     @if($notification->type=='App\Notifications\jobOffers')
                                         <div class="panel panel-default" style="text-align:justify; width:550px; word-wrap:break-word;overflow-wrap: break-word; background-color:lightgrey; ">
                                            @include('partials.notification')
                                          </div>
                                    @else
                                       <div class="panel panel-default" style="text-align:justify;width:550px; word-wrap:break-word;overflow-wrap: break-word;background-color:lightgrey;  ">
                                         @include('partials.offerAcceptence_notification') 
                                        </div>
                                    @endif

                                    @endforeach

                                </li>
                               
                                <li class="dropdown-header" >
                                @foreach(auth()->User()->readNotifications as $notification)
                                     @if($notification->type=='App\Notifications\jobOffers')
                                         <div class="panel panel-default" style="text-align:justify;width:550px; word-wrap:break-word;overflow-wrap: break-word; ">
                                             @include('partials.notification')
                                       </div>
                                    @else
                                        <div class="panel panel-default" style="text-align:justify;width:550px; word-wrap:break-word;overflow-wrap: break-word; ">
                                            @include('partials.offerAcceptence_notification') 
                                        </div>
                                    @endif

                                    @endforeach
                                @if(count(auth()->User()->readNotifications)==0 && count(auth()->User()->unreadNotifications)==0)
                                    <a>No Notification</a>
                                 @endif
                                </li>
                                
                            </ul>
                        </li>
                        {{--end notification dropdown--}}

                        <li>
                        
                        
                          <a href="{{ url('profile') }}">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
                           
                        </li>

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                               <i class="fas fa-sign-out-alt fa-lg"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
    <!-- Job Modal -->
    @include('template.jobPostModal')








    <script type="text/javascript">
        $(function () {
            $(".img-modal-btn.right").on('click', function (e) {
                e.preventDefault();
                cur = $(this).parent().find('img:visible()');
                next = cur.next('img');
                par = cur.parent();
                if (!next.length) {
                    next = $(cur.parent().find("img").get(0))
                }
                cur.addClass('hidden');
                next.removeClass('hidden');

                return false;
            })

            $(".img-modal-btn.left").on('click', function (e) {
                e.preventDefault();
                cur = $(this).parent().find('img:visible()');
                next = cur.prev('img');
                par = cur.parent();
                children = cur.parent().find("img");
                if (!next.length) {
                    next = $(children.get(children.length - 1))
                }
                cur.addClass('hidden');
                next.removeClass('hidden');

                return false;
            })

        });
        $(document).ready(function () {
            $("input[name='job_post_option']").click(function () {
                var radioValue = $("input[name='job_post_option']:checked").val();
                if (radioValue == 1) {
                    //setTimeout($('#jobModal').modal('hide'), 10000000);
                    $('#jobModal').modal('hide');
                    $('#available_job_modal').modal('show');
                }


                if (radioValue == 2) {
                    //setTimeout($('#jobModal').modal('hide'), 10000000);
                    $('#jobModal').modal('hide');
                    $('#want_to_hire_modal').modal('show');

                }
            });

        });
          
         
            //end sidebar style */
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- End of import Scripts -->

    <script src="js/js/select2.full.js"></script>
    <script src="js/js/select2.full.min.js"></script>
    <script src="js/js/select2.js"></script>
    <script src="js/js/select2.min.js"></script>
    <script>
        $(function () {
            
            $("#interest_id").select2({ maximumSelectionLength: 5 });
        })
    </script>
</body>

</html>