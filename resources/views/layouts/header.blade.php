<!DOCTYPE HTML>
<?php
header("Cache-Control: Public"); //HTTP 1.1
header("Expires: Sat, 26 Jul 2020 05:00:00 GMT");

		?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Car Share Scheme.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Car Sharing Site" />
	<meta name="keywords" content="Car, Share, Scheme, Luxury, Affordable" />
	<meta name="author" content="Anesu Chiodze, Angel English, Jacobde Bruyn, Thien Duc Thi" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />



	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
        
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="{!! url('/'); !!}">Car Share Scheme.</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li><a href="home">Home</a></li>
						<li><a href="booking">Book a car</a></li>
						<li><a href="about">About</a></li>
						<li><a href="contact">Contact</a></li>
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
                                        <a href="{{ url('/home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/account') }}">My Account</a>
                                    </li>
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
                      
                    </ul>
				</div>
			</div>
			
		</div>
	</nav>
