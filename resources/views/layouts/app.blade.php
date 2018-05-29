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
                    <div id="fh5co-logo"><a href="../front-end/index.php">Car Share Scheme.</a></div>
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
 @yield('content')






















    <!-- <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header"> -->
                    <!-- Collapsed Hamburger
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> ---->
                    <!-- Branding Image -->
                   <!--  <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="collapse navbar-collapse " id="app-navbar-collapse">
                     Left Side Of Navbar -->
                    <!-- <ul class="nav navbar-nav col-md-push-5" style="border: solid"> -->
                       <!--  &nbsp;
                        <li><a href="book.php">Book a car</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>  -->
                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="nav navbar-nav navbar-right" style="border: solid"> -->
                        <!-- Authentication Links -->
                        
      <!--               </ul>
                </div>
            </div>
        </nav>
       
    </div>  -->




    <!-- Scripts -->
    <script src="../front-end/js/app.js"></script>
    <!-- jQuery -->
    <script src="../front-end/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="../front-end/js/jquery.easing.1.3.js"></script>
    <!-- jQuery UI -->
    <script src="../front-end/js/jquery-ui.min.js"></script>
    <!-- Moment JS -->
    <script src="../front-end/js/moment.min.js"></script>
    <!-- Bootstrap -->
    <script src="../front-end/js/bootstrap.min.js"></script>
    <!-- Bootstrap Timepicker -->
    <!--<script src="js/bootstrap-datetimepicker.min.js"></script>-->
    <!-- Timepicker -->
    <script src="../front-end/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
    /*$(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });*/
</script>
<script type="text/javascript">
  $(function() {
    $('#start_datetimepicker').datetimepicker({
      language: 'en',
        controlType: 'select',
    timeFormat: 'hh:mm tt'
    });
      
      $('#end_datetimepicker').datetimepicker({
      language: 'en',
        controlType: 'select',
    timeFormat: 'hh:mm tt'
    });
      
  });
</script>
    <!-- Waypoints -->
    <script src="../front-end/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="../front-end/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="../front-end/js/jquery.countTo.js"></script>
    <!-- Flexslider -->
    <script src="../front-end/js/jquery.flexslider-min.js"></script>
    <!-- Main -->
    <script src="../front-end/js/main.js"></script>
</body>
</html>