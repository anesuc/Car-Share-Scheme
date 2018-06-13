<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <!-- Animate.css -->
    <link rel="stylesheet" href="../front-end/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="../front-end/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="../front-end/css/bootstrap.css">
        
    <!-- Jquery UI  -->
    <link rel="stylesheet" href="../front-end/css/jquery-ui.css">        

    <!-- Flexslider  -->
    <link rel="stylesheet" href="../front-end/css/flexslider.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../front-end/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../front-end/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="../front-end/css/style.css">

    <!-- Angel style -->
    <link rel="stylesheet" href="../front-end/css/Astyle.css">
        
    <!-- Glyphicons style -->
    <link href="../front-end/css/bootstrap.icon-large.min.css" rel="stylesheet">
        
        <!-- Time picker -->
    <link rel="stylesheet" href="../front-end/css/jquery-ui-timepicker-addon.css">
        
        <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  </head>

    <!-- Modernizr JS -->
    <script src="../front-end/js/modernizr-2.6.2.min.js"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="page">
        
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-2">

                    
                    <div id="fh5co-logo"><a href="{{ url('/home') }}">Car Share Scheme.</a></div>
                </div>
                <div class="col-md-6 col-xs-6 text-center menu-1">
                    <ul>
                        <li><a href="../front-end/book.php">Book a car</a></li>
                        <li><a href="../front-end/about.html">About</a></li>
                        <li><a href="../front-end/contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                    <ul>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                      
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </nav>


