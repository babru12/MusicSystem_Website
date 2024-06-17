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
@include('music.header');
<div class="contact pad" id="contact">
				<div class="container">
					<!-- default heading -->
					<div class="default-heading">
						<!-- heading -->
						<h2>Contact Us</h2>
					</div>
					<div class="row">	
						<div class="col-md-4 col-sm-4">
							<!-- contact item -->
							<div class="contact-item ">
								<!-- big icon -->
								<i class="fa fa-street-view"></i>
								<!-- contact details  -->
								<span class="contact-details">#712,VIM colony, Near Sai temple - 751024</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- contact item -->
							<div class="contact-item ">
								<!-- big icon -->
								<i class="fa fa-wifi"></i>
								<!-- contact details  -->
								<span class="contact-details">music.site@melodi.com</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- contact item -->
							<div class="contact-item ">
								<!-- big icon -->
								<i class="fa fa-phone"></i>
								<!-- contact details  -->
								<span class="contact-details">9556013448</span>
							</div>
						</div>
					</div>
					<!-- form content -->
					<div class="form-content ">
						<!-- paragraph -->
						<p>Do you have any idea in your mind? Drop us a line.</p>
						<form role="form" id="contactForm" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
									</div>
									<div class="form-group">
										<label for="phone">Phone</label>
										<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label for="message">Give the feedback</label>
										<textarea class="form-control" id="message" name="message" rows="9" placeholder="Enter message"></textarea>
									</div>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-theme">Send Message</button>
							</div>
							<p style="color:green">{{$message}}</p>

						</form>
												
					</div>

				</div>
			</div>
			@include('music.footer');