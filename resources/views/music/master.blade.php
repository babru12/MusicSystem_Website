<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Melodi</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="HimanshuGupta">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Add this to your HTML template -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link href="{{url('/')}}/melodi/HTML/css/bootstrap.min.css" rel="stylesheet">	
		<!-- Animate CSS -->
		<link href="{{url('/')}}/melodi/HTML/css/animate.min.css" rel="stylesheet">
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="{{url('/')}}/melodi/HTML/css/owl.carousel.css">
		<!-- Font awesome CSS -->
		<link href="{{url('/')}}/melodi/HTML/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="{{url('/')}}/melodi/HTML/css/style.css" rel="stylesheet">
		<link href="{{url('/')}}/melodi/HTML/css/style-color.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{url('/')}}/melodi/HTML/img/logo/favicon.ico">
	</head>
    <body>
        <div class="wrapper" id="home">
          @include('music.header');
          @include('music.banner');
          @include('music.latestalbum');
          @include('music.parallex');
          @include('music.addmusic');
          @include('music.parallex1');
          @include('music.join');
          @include('music.newsletter');
          @include('music.portfolio');
          @include('music.events');
          @include('music.about');
          @include('music.parallex2');
          @include('music.contact');
          @include('music.footer');
          <span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
        </div>
        <script src="{{url('/')}}/melodi/HTML/js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="{{url('/')}}/melodi/HTML/js/bootstrap.min.js"></script>
		<!-- WayPoints JS -->
		<script src="{{url('/')}}/melodi/HTML/js/waypoints.min.js"></script>
		<!-- Include js plugin -->
		<script src="{{url('/')}}/melodi/HTML/js/owl.carousel.min.js"></script>
		<!-- One Page Nav -->
		<script src="{{url('/')}}/melodi/HTML/js/jquery.nav.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="{{url('/')}}/melodi/HTML/js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="{{url('/')}}/melodi/HTML/js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="{{url('/')}}/melodi/HTML/js/custom.js"></script>
    </body>
    </html>