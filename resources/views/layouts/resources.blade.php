<!-- Animate.css -->
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
<!-- Bootstrap  -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!-- Flexslider  -->
<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">

<!-- Owl Carousel  -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

<!-- Date Range Picker -->
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">

<!-- Theme style  -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Angel style -->
<link rel="stylesheet" href="{{ asset('css/Astyle.min.css') }}">

<!-- Payment css -->
<link rel="stylesheet" href="{{ asset('css/payment.min.css') }}">

<!-- Modernizr JS -->
<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<!-- Carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- countTo -->
<script src="{{ asset('js/jquery.countTo.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
<!-- Moment -->
<script src="{{ asset('js/moment.min.js') }}"></script>
<!-- Date Range Picker -->
<script src="{{ asset('js/daterangepicker.min.js') }}"></script>

<?php
if(isset($_GET['type'])) {
    echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHU34atHJNLRCfcIGJJKkK6FDufXOj-Sc&sensor=false"></script>';
    echo "<script src='js/map.js'></script>";
}

//<script src='{{ asset("js/map.js") }}'></script>
?>
<!-- Main -->
<script src="{{ asset('js/main.min.js') }}"></script>