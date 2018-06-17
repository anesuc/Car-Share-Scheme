        
        
        
        
        


        
        <footer>
		<div class="container">
            


			<div class="row copyright">
				<div class="col-md-12 text-center">
					<div class="footer-info">
						<small class="block">&copy; 2018 Car Share Scheme.</small>
                        <!-- _blank to open in a new tab so that the user doesn't lose the page -->
						<small class="block">Developed by <a href="https://twitter.com/AnesuChiodze" target="_blank">Anesu Chiodze</a>, <a href="#">Angel English</a>, <a href="#">Jacob De Bruyn</a>, <a href="#">Thien Thi</a></small>
					</div>
					<div>
                        <!-- Adding some company social media network icons just so that it looks professional even if we don't have any haha -->
						<ul class="footer-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>



	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

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
	</body>
</html>

