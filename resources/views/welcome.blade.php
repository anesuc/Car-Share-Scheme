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
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i class="icon-shopping-cart"></i></span></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </nav>





    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
            <li style="background-image: url(../front-end/images/cars/tesla_model_x.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc">
                                <span class="price">$50/hr</span>
                                <h2>Premium Cars</h2>
                                <p>A great selection of premium cars such as the Tesla Model X Blah blah blah.</p>
                                <p><a href="../front-end/single.html" class="btn btn-primary btn-outline btn-lg">Book Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(../front-end/images/cars/toyota_camry_ascent_hybrid.jpg);">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc">
                                <span class="price">$30/hr</span>
                                <h2>Basic</h2>
                                <p>Need a car just to get from point A to B? We've got you covered! blah blah blah</p>
                                <p><a href="../front-end/single.html" class="btn btn-primary btn-outline btn-lg">Book Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            </ul>
        </div>
    </aside>
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
    </body>
</html>
