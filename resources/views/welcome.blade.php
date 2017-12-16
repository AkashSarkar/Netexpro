<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Netexpro</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: black;
                color: white;
                font-family: 'Raleway', sans-serif;
                
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight:800;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
             
            }
            

            .m-b-md {
                margin-bottom: 30px;
            }

            /*Animation*/
        
                .box-with-text {
                position: relative;
                overflow: hidden;

                text-transform: uppercase;
                font-size: ;
                }
                .box-with-text:before {
                    content: '';
                    display:block;
                    position: absolute;
                    border-radius: 50%;
                    box-shadow: 0vmax 0vmax 10vmax 10vmax purple, 15vmax 0vmax 10vmax 10vmax violet, 30vmax 0vmax 10vmax 10vmax teal, 45vmax 0vmax 10vmax 10vmax orangered, 60vmax 0vmax 10vmax 10vmax yellow, 75vmax 0vmax 10vmax 10vmax crimson, 90vmax 0vmax 10vmax 10vmax yellowgreen, 105vmax 0vmax 10vmax 10vmax orange, 120vmax 0vmax 10vmax 10vmax darkturquoise, 135vmax 0vmax 10vmax 10vmax pink, 0vmax 15vmax 10vmax 10vmax steelblue, 15vmax 15vmax 10vmax 10vmax turquoise, 30vmax 15vmax 10vmax 10vmax coral, 45vmax 15vmax 10vmax 10vmax skyblue, 60vmax 15vmax 10vmax 10vmax darkviolet, 75vmax 15vmax 10vmax 10vmax gold, 90vmax 15vmax 10vmax 10vmax purple, 105vmax 15vmax 10vmax 10vmax violet, 120vmax 15vmax 10vmax 10vmax teal, 135vmax 15vmax 10vmax 10vmax orangered, 0vmax 30vmax 10vmax 10vmax yellow, 15vmax 30vmax 10vmax 10vmax crimson, 30vmax 30vmax 10vmax 10vmax yellowgreen, 45vmax 30vmax 10vmax 10vmax orange, 60vmax 30vmax 10vmax 10vmax darkturquoise, 75vmax 30vmax 10vmax 10vmax pink, 90vmax 30vmax 10vmax 10vmax steelblue, 105vmax 30vmax 10vmax 10vmax turquoise, 120vmax 30vmax 10vmax 10vmax coral, 135vmax 30vmax 10vmax 10vmax skyblue, 0vmax 45vmax 10vmax 10vmax darkviolet, 15vmax 45vmax 10vmax 10vmax gold, 30vmax 45vmax 10vmax 10vmax darkslateblue, 45vmax 45vmax 10vmax 10vmax purple, 60vmax 45vmax 10vmax 10vmax violet, 75vmax 45vmax 10vmax 10vmax teal, 90vmax 45vmax 10vmax 10vmax orangered, 105vmax 45vmax 10vmax 10vmax yellow, 120vmax 45vmax 10vmax 10vmax crimson, 135vmax 45vmax 10vmax 10vmax yellowgreen, 0vmax 60vmax 10vmax 10vmax orange, 15vmax 60vmax 10vmax 10vmax darkturquoise, 30vmax 60vmax 10vmax 10vmax pink, 45vmax 60vmax 10vmax 10vmax steelblue, 60vmax 60vmax 10vmax 10vmax turquoise, 75vmax 60vmax 10vmax 10vmax coral, 90vmax 60vmax 10vmax 10vmax skyblue, 105vmax 60vmax 10vmax 10vmax darkviolet, 120vmax 60vmax 10vmax 10vmax gold, 135vmax 60vmax 10vmax 10vmax darkslateblue;
                    -webkit-animation: shadows-cells 2.5s linear infinite;
                    animation: shadows-cells 2.5s linear infinite; }
                .box-with-text:after {
                    content: '';
                    position: absolute;
                    top: -2px;
                    right: -2px;
                    bottom: -2px;
                    left: -2px;
                    display: block;
                    border: 4px solid black; }

                .text {
                position: relative;
                
                background: black;
                color: white;
                mix-blend-mode: darken; }

                @-webkit-keyframes shadows-cells {
                25% {
                    box-shadow: 0vmax 0vmax 10vmax 10vmax coral, 15vmax 0vmax 10vmax 10vmax skyblue, 30vmax 0vmax 10vmax 10vmax darkviolet, 45vmax 0vmax 10vmax 10vmax gold, 60vmax 0vmax 10vmax 10vmax purple, 75vmax 0vmax 10vmax 10vmax violet, 90vmax 0vmax 10vmax 10vmax teal, 105vmax 0vmax 10vmax 10vmax orangered, 120vmax 0vmax 10vmax 10vmax yellow, 135vmax 0vmax 10vmax 10vmax crimson, 0vmax 15vmax 10vmax 10vmax yellowgreen, 15vmax 15vmax 10vmax 10vmax orange, 30vmax 15vmax 10vmax 10vmax darkturquoise, 45vmax 15vmax 10vmax 10vmax pink, 60vmax 15vmax 10vmax 10vmax steelblue, 75vmax 15vmax 10vmax 10vmax turquoise, 90vmax 15vmax 10vmax 10vmax coral, 105vmax 15vmax 10vmax 10vmax skyblue, 120vmax 15vmax 10vmax 10vmax darkviolet, 135vmax 15vmax 10vmax 10vmax gold, 0vmax 30vmax 10vmax 10vmax darkslateblue, 15vmax 30vmax 10vmax 10vmax purple, 30vmax 30vmax 10vmax 10vmax violet, 45vmax 30vmax 10vmax 10vmax teal, 60vmax 30vmax 10vmax 10vmax orangered, 75vmax 30vmax 10vmax 10vmax yellow, 90vmax 30vmax 10vmax 10vmax crimson, 105vmax 30vmax 10vmax 10vmax yellowgreen, 120vmax 30vmax 10vmax 10vmax orange, 135vmax 30vmax 10vmax 10vmax darkturquoise, 0vmax 45vmax 10vmax 10vmax pink, 15vmax 45vmax 10vmax 10vmax steelblue, 30vmax 45vmax 10vmax 10vmax turquoise, 45vmax 45vmax 10vmax 10vmax coral, 60vmax 45vmax 10vmax 10vmax skyblue, 75vmax 45vmax 10vmax 10vmax darkviolet, 90vmax 45vmax 10vmax 10vmax gold, 105vmax 45vmax 10vmax 10vmax darkslateblue, 120vmax 45vmax 10vmax 10vmax purple, 135vmax 45vmax 10vmax 10vmax violet, 0vmax 60vmax 10vmax 10vmax teal, 15vmax 60vmax 10vmax 10vmax orangered, 30vmax 60vmax 10vmax 10vmax yellow, 45vmax 60vmax 10vmax 10vmax crimson, 60vmax 60vmax 10vmax 10vmax yellowgreen, 75vmax 60vmax 10vmax 10vmax orange, 90vmax 60vmax 10vmax 10vmax darkturquoise, 105vmax 60vmax 10vmax 10vmax pink, 120vmax 60vmax 10vmax 10vmax steelblue, 135vmax 60vmax 10vmax 10vmax turquoise; }
                45% {
                    box-shadow: 0vmax 0vmax 10vmax 10vmax yellowgreen, 15vmax 0vmax 10vmax 10vmax orange, 30vmax 0vmax 10vmax 10vmax darkturquoise, 45vmax 0vmax 10vmax 10vmax pink, 60vmax 0vmax 10vmax 10vmax steelblue, 75vmax 0vmax 10vmax 10vmax turquoise, 90vmax 0vmax 10vmax 10vmax coral, 105vmax 0vmax 10vmax 10vmax skyblue, 120vmax 0vmax 10vmax 10vmax darkviolet, 135vmax 0vmax 10vmax 10vmax gold, 0vmax 15vmax 10vmax 10vmax purple, 15vmax 15vmax 10vmax 10vmax violet, 30vmax 15vmax 10vmax 10vmax teal, 45vmax 15vmax 10vmax 10vmax orangered, 60vmax 15vmax 10vmax 10vmax yellow, 75vmax 15vmax 10vmax 10vmax crimson, 90vmax 15vmax 10vmax 10vmax yellowgreen, 105vmax 15vmax 10vmax 10vmax orange, 120vmax 15vmax 10vmax 10vmax darkturquoise, 135vmax 15vmax 10vmax 10vmax pink, 0vmax 30vmax 10vmax 10vmax steelblue, 15vmax 30vmax 10vmax 10vmax turquoise, 30vmax 30vmax 10vmax 10vmax coral, 45vmax 30vmax 10vmax 10vmax skyblue, 60vmax 30vmax 10vmax 10vmax darkviolet, 75vmax 30vmax 10vmax 10vmax gold, 90vmax 30vmax 10vmax 10vmax darkslateblue, 105vmax 30vmax 10vmax 10vmax purple, 120vmax 30vmax 10vmax 10vmax violet, 135vmax 30vmax 10vmax 10vmax teal, 0vmax 45vmax 10vmax 10vmax orangered, 15vmax 45vmax 10vmax 10vmax yellow, 30vmax 45vmax 10vmax 10vmax crimson, 45vmax 45vmax 10vmax 10vmax yellowgreen, 60vmax 45vmax 10vmax 10vmax orange, 75vmax 45vmax 10vmax 10vmax darkturquoise, 90vmax 45vmax 10vmax 10vmax pink, 105vmax 45vmax 10vmax 10vmax steelblue, 120vmax 45vmax 10vmax 10vmax turquoise, 135vmax 45vmax 10vmax 10vmax coral, 0vmax 60vmax 10vmax 10vmax skyblue, 15vmax 60vmax 10vmax 10vmax darkviolet, 30vmax 60vmax 10vmax 10vmax gold, 45vmax 60vmax 10vmax 10vmax darkslateblue, 60vmax 60vmax 10vmax 10vmax purple, 75vmax 60vmax 10vmax 10vmax violet, 90vmax 60vmax 10vmax 10vmax teal, 105vmax 60vmax 10vmax 10vmax orangered, 120vmax 60vmax 10vmax 10vmax yellow, 135vmax 60vmax 10vmax 10vmax crimson; }
                75% {
                    box-shadow: 0vmax 0vmax 10vmax 10vmax teal, 15vmax 0vmax 10vmax 10vmax orangered, 30vmax 0vmax 10vmax 10vmax yellow, 45vmax 0vmax 10vmax 10vmax crimson, 60vmax 0vmax 10vmax 10vmax yellowgreen, 75vmax 0vmax 10vmax 10vmax orange, 90vmax 0vmax 10vmax 10vmax darkturquoise, 105vmax 0vmax 10vmax 10vmax pink, 120vmax 0vmax 10vmax 10vmax steelblue, 135vmax 0vmax 10vmax 10vmax turquoise, 0vmax 15vmax 10vmax 10vmax coral, 15vmax 15vmax 10vmax 10vmax skyblue, 30vmax 15vmax 10vmax 10vmax darkviolet, 45vmax 15vmax 10vmax 10vmax gold, 60vmax 15vmax 10vmax 10vmax darkslateblue, 75vmax 15vmax 10vmax 10vmax purple, 90vmax 15vmax 10vmax 10vmax violet, 105vmax 15vmax 10vmax 10vmax teal, 120vmax 15vmax 10vmax 10vmax orangered, 135vmax 15vmax 10vmax 10vmax yellow, 0vmax 30vmax 10vmax 10vmax crimson, 15vmax 30vmax 10vmax 10vmax yellowgreen, 30vmax 30vmax 10vmax 10vmax orange, 45vmax 30vmax 10vmax 10vmax darkturquoise, 60vmax 30vmax 10vmax 10vmax pink, 75vmax 30vmax 10vmax 10vmax steelblue, 90vmax 30vmax 10vmax 10vmax turquoise, 105vmax 30vmax 10vmax 10vmax coral, 120vmax 30vmax 10vmax 10vmax skyblue, 135vmax 30vmax 10vmax 10vmax darkviolet, 0vmax 45vmax 10vmax 10vmax gold, 15vmax 45vmax 10vmax 10vmax darkslateblue, 30vmax 45vmax 10vmax 10vmax purple, 45vmax 45vmax 10vmax 10vmax violet, 60vmax 45vmax 10vmax 10vmax teal, 75vmax 45vmax 10vmax 10vmax orangered, 90vmax 45vmax 10vmax 10vmax yellow, 105vmax 45vmax 10vmax 10vmax crimson, 120vmax 45vmax 10vmax 10vmax yellowgreen, 135vmax 45vmax 10vmax 10vmax orange, 0vmax 60vmax 10vmax 10vmax darkturquoise, 15vmax 60vmax 10vmax 10vmax pink, 30vmax 60vmax 10vmax 10vmax steelblue, 45vmax 60vmax 10vmax 10vmax turquoise, 60vmax 60vmax 10vmax 10vmax coral, 75vmax 60vmax 10vmax 10vmax skyblue, 90vmax 60vmax 10vmax 10vmax darkviolet, 105vmax 60vmax 10vmax 10vmax gold, 120vmax 60vmax 10vmax 10vmax darkslateblue, 135vmax 60vmax 10vmax 10vmax purple; } }
                @keyframes shadows-cells {
                25% {
                    box-shadow: 0vmax 0vmax 10vmax 10vmax coral, 15vmax 0vmax 10vmax 10vmax skyblue, 30vmax 0vmax 10vmax 10vmax darkviolet, 45vmax 0vmax 10vmax 10vmax gold, 60vmax 0vmax 10vmax 10vmax purple, 75vmax 0vmax 10vmax 10vmax violet, 90vmax 0vmax 10vmax 10vmax teal, 105vmax 0vmax 10vmax 10vmax orangered, 120vmax 0vmax 10vmax 10vmax yellow, 135vmax 0vmax 10vmax 10vmax crimson, 0vmax 15vmax 10vmax 10vmax yellowgreen, 15vmax 15vmax 10vmax 10vmax orange, 30vmax 15vmax 10vmax 10vmax darkturquoise, 45vmax 15vmax 10vmax 10vmax pink, 60vmax 15vmax 10vmax 10vmax steelblue, 75vmax 15vmax 10vmax 10vmax turquoise, 90vmax 15vmax 10vmax 10vmax coral, 105vmax 15vmax 10vmax 10vmax skyblue, 120vmax 15vmax 10vmax 10vmax darkviolet, 135vmax 15vmax 10vmax 10vmax gold, 0vmax 30vmax 10vmax 10vmax darkslateblue, 15vmax 30vmax 10vmax 10vmax purple, 30vmax 30vmax 10vmax 10vmax violet, 45vmax 30vmax 10vmax 10vmax teal, 60vmax 30vmax 10vmax 10vmax orangered, 75vmax 30vmax 10vmax 10vmax yellow, 90vmax 30vmax 10vmax 10vmax crimson, 105vmax 30vmax 10vmax 10vmax yellowgreen, 120vmax 30vmax 10vmax 10vmax orange, 135vmax 30vmax 10vmax 10vmax darkturquoise, 0vmax 45vmax 10vmax 10vmax pink, 15vmax 45vmax 10vmax 10vmax steelblue, 30vmax 45vmax 10vmax 10vmax turquoise, 45vmax 45vmax 10vmax 10vmax coral, 60vmax 45vmax 10vmax 10vmax skyblue, 75vmax 45vmax 10vmax 10vmax darkviolet, 90vmax 45vmax 10vmax 10vmax gold, 105vmax 45vmax 10vmax 10vmax darkslateblue, 120vmax 45vmax 10vmax 10vmax purple, 135vmax 45vmax 10vmax 10vmax violet, 0vmax 60vmax 10vmax 10vmax teal, 15vmax 60vmax 10vmax 10vmax orangered, 30vmax 60vmax 10vmax 10vmax yellow, 45vmax 60vmax 10vmax 10vmax crimson, 60vmax 60vmax 10vmax 10vmax yellowgreen, 75vmax 60vmax 10vmax 10vmax orange, 90vmax 60vmax 10vmax 10vmax darkturquoise, 105vmax 60vmax 10vmax 10vmax pink, 120vmax 60vmax 10vmax 10vmax steelblue, 135vmax 60vmax 10vmax 10vmax turquoise; }
                45% {
                    box-shadow: 0vmax 0vmax 10vmax 10vmax yellowgreen, 15vmax 0vmax 10vmax 10vmax orange, 30vmax 0vmax 10vmax 10vmax darkturquoise, 45vmax 0vmax 10vmax 10vmax pink, 60vmax 0vmax 10vmax 10vmax steelblue, 75vmax 0vmax 10vmax 10vmax turquoise, 90vmax 0vmax 10vmax 10vmax coral, 105vmax 0vmax 10vmax 10vmax skyblue, 120vmax 0vmax 10vmax 10vmax darkviolet, 135vmax 0vmax 10vmax 10vmax gold, 0vmax 15vmax 10vmax 10vmax purple, 15vmax 15vmax 10vmax 10vmax violet, 30vmax 15vmax 10vmax 10vmax teal, 45vmax 15vmax 10vmax 10vmax orangered, 60vmax 15vmax 10vmax 10vmax yellow, 75vmax 15vmax 10vmax 10vmax crimson, 90vmax 15vmax 10vmax 10vmax yellowgreen, 105vmax 15vmax 10vmax 10vmax orange, 120vmax 15vmax 10vmax 10vmax darkturquoise, 135vmax 15vmax 10vmax 10vmax pink, 0vmax 30vmax 10vmax 10vmax steelblue, 15vmax 30vmax 10vmax 10vmax turquoise, 30vmax 30vmax 10vmax 10vmax coral, 45vmax 30vmax 10vmax 10vmax skyblue, 60vmax 30vmax 10vmax 10vmax darkviolet, 75vmax 30vmax 10vmax 10vmax gold, 90vmax 30vmax 10vmax 10vmax darkslateblue, 105vmax 30vmax 10vmax 10vmax purple, 120vmax 30vmax 10vmax 10vmax violet, 135vmax 30vmax 10vmax 10vmax teal, 0vmax 45vmax 10vmax 10vmax orangered, 15vmax 45vmax 10vmax 10vmax yellow, 30vmax 45vmax 10vmax 10vmax crimson, 45vmax 45vmax 10vmax 10vmax yellowgreen, 60vmax 45vmax 10vmax 10vmax orange, 75vmax 45vmax 10vmax 10vmax darkturquoise, 90vmax 45vmax 10vmax 10vmax pink, 105vmax 45vmax 10vmax 10vmax steelblue, 120vmax 45vmax 10vmax 10vmax turquoise, 135vmax 45vmax 10vmax 10vmax coral, 0vmax 60vmax 10vmax 10vmax skyblue, 15vmax 60vmax 10vmax 10vmax darkviolet, 30vmax 60vmax 10vmax 10vmax gold, 45vmax 60vmax 10vmax 10vmax darkslateblue, 60vmax 60vmax 10vmax 10vmax purple, 75vmax 60vmax 10vmax 10vmax violet, 90vmax 60vmax 10vmax 10vmax teal, 105vmax 60vmax 10vmax 10vmax orangered, 120vmax 60vmax 10vmax 10vmax yellow, 135vmax 60vmax 10vmax 10vmax crimson; }
                75% {
                    box-shadow: 0vmax 0vmax 10vmax 10vmax teal, 15vmax 0vmax 10vmax 10vmax orangered, 30vmax 0vmax 10vmax 10vmax yellow, 45vmax 0vmax 10vmax 10vmax crimson, 60vmax 0vmax 10vmax 10vmax yellowgreen, 75vmax 0vmax 10vmax 10vmax orange, 90vmax 0vmax 10vmax 10vmax darkturquoise, 105vmax 0vmax 10vmax 10vmax pink, 120vmax 0vmax 10vmax 10vmax steelblue, 135vmax 0vmax 10vmax 10vmax turquoise, 0vmax 15vmax 10vmax 10vmax coral, 15vmax 15vmax 10vmax 10vmax skyblue, 30vmax 15vmax 10vmax 10vmax darkviolet, 45vmax 15vmax 10vmax 10vmax gold, 60vmax 15vmax 10vmax 10vmax darkslateblue, 75vmax 15vmax 10vmax 10vmax purple, 90vmax 15vmax 10vmax 10vmax violet, 105vmax 15vmax 10vmax 10vmax teal, 120vmax 15vmax 10vmax 10vmax orangered, 135vmax 15vmax 10vmax 10vmax yellow, 0vmax 30vmax 10vmax 10vmax crimson, 15vmax 30vmax 10vmax 10vmax yellowgreen, 30vmax 30vmax 10vmax 10vmax orange, 45vmax 30vmax 10vmax 10vmax darkturquoise, 60vmax 30vmax 10vmax 10vmax pink, 75vmax 30vmax 10vmax 10vmax steelblue, 90vmax 30vmax 10vmax 10vmax turquoise, 105vmax 30vmax 10vmax 10vmax coral, 120vmax 30vmax 10vmax 10vmax skyblue, 135vmax 30vmax 10vmax 10vmax darkviolet, 0vmax 45vmax 10vmax 10vmax gold, 15vmax 45vmax 10vmax 10vmax darkslateblue, 30vmax 45vmax 10vmax 10vmax purple, 45vmax 45vmax 10vmax 10vmax violet, 60vmax 45vmax 10vmax 10vmax teal, 75vmax 45vmax 10vmax 10vmax orangered, 90vmax 45vmax 10vmax 10vmax yellow, 105vmax 45vmax 10vmax 10vmax crimson, 120vmax 45vmax 10vmax 10vmax yellowgreen, 135vmax 45vmax 10vmax 10vmax orange, 0vmax 60vmax 10vmax 10vmax darkturquoise, 15vmax 60vmax 10vmax 10vmax pink, 30vmax 60vmax 10vmax 10vmax steelblue, 45vmax 60vmax 10vmax 10vmax turquoise, 60vmax 60vmax 10vmax 10vmax coral, 75vmax 60vmax 10vmax 10vmax skyblue, 90vmax 60vmax 10vmax 10vmax darkviolet, 105vmax 60vmax 10vmax 10vmax gold, 120vmax 60vmax 10vmax 10vmax darkslateblue, 135vmax 60vmax 10vmax 10vmax purple; } }




            /*End Animation*/




        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="" href="{{ route('login') }}">Login</a>
                        <a class="" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md box-with-text">
                 <div class="text"> Netexpro </div>
                </div>

                <div class="links box-with-text">
                    <a class="text" >Network Express of Professionals</a>
                    
                </div>
            </div>
        </div>
    </body>
</html>
