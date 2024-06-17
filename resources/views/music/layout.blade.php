<!DOCTYPE html>
<html?>
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
        @include('music.header');
        @include('music.banner');
        @include('music.musiclist');
        @include('music.footer');
    </body>
    </html>