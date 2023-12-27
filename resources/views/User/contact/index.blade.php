@extends('User.layout.user')
@section('container')

<!DOCTYPE html>
<html>

<body>

<div class="page-wrapper">
	
	<!-- Contact Page Section -->
    <div class="contact-page-section">
    	<div class="auto-container">
        	<div class="row clearfix">
				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
					
						<!-- Info Box -->
						<div class="info-box">
							<div class="box-inner d-flex align-items-center">
								<div class="icon flaticon-email-1"></div>
								<div class="content">
									<strong>Mail address</strong>
									<a href="mailto:lutfiardi873@gmail.com">{{$contacts->email}}</a><br>
									<a href="tel:+6285710850239">{{$contacts->no_telp}}</a>
								</div>
							</div>
						</div>
						
						<!-- Info Box -->
						<div class="info-box">
							<div class="box-inner d-flex align-items-center">
								<div class="icon flaticon-map"></div>
								<div class="content">
									<strong>Office address</strong>
									<div class="text">{!!$contacts->alamat!!}</div>
								</div>
							</div>
						</div>
						
						<!-- Info Box -->
						<div class="info-box">
							<div class="box-inner d-flex align-items-center">
								<div class="icon flaticon-call"></div>
								<div class="content">
									<strong>Phone Number</strong>
									<a href="tel:+6281-710-850-239">{{$contacts->no_telp}}</a><br>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<!-- Map Column -->
				<div class="map-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<!--Map Outer-->
						<div class="map-outer">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d434.7467556871754!2d109.93437551690147!3d-6.929128820517004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e703f339936f1e9%3A0x65c11fc0b5302bc5!2sPULSAKUCELL!5e0!3m2!1sid!2sid!4v1695659009504!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Contact Boxed -->
			<div class="contact-boxed">
				<!-- Title Box -->
				<div class="title-box">
					<h3>Drop Us a Line</h3>
					<div class="text">Your email address will not be published. Required fields are marked *</div>
				</div>
				
				<!-- Contact Form -->
				<div class="contact-form">
					<form method="post" action="sendemail.php" id="contact-form">
						<div class="row clearfix">
							
							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<input type="text" name="username" placeholder="Enter Your name" required="">
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<input type="text" name="email" placeholder="Enter Email Address*" required="">
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<select name="currency" class="custom-select-box" name="services" required>
									<option>Select Service Type</option>
									<option>City 01</option>
									<option>City 02</option>
									<option>City 03</option>
									<option>City 04</option>
								</select>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<input type="text" name="phone" placeholder="Enter Phone Number" required="">
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<textarea class="" name="message" placeholder="Enter Your Messege here"></textarea>
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<div class="buttons-box">
									<button class="theme-btn btn-style-one">
										post a comment
									</button>
								</div>
							</div>
							
						</div>
					</form>
				</div>
				<!-- End Contact Form -->
				
			</div>
			<!-- End Contact Boxed -->
			
		</div>
	</div>
	<!-- End Contact Page Section -->
	
	<!-- Gallery Section -->
	<section class="gallery-section">
		<div class="outer-container">
			<div class="instagram-carousel owl-carousel owl-theme">
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="images/gallery/1.jpg" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/1.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="images/gallery/2.jpg" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/1.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="images/gallery/3.jpg" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/3.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="images/gallery/4.jpg" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/4.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="images/gallery/5.jpg" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/5.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="images/gallery/6.jpg" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/6.jpg"></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Gallery Section -->
	
</div>
<!-- End PageWrapper -->

<!-- Search Popup -->
<div class="search-popup">
	<div class="color-layer"></div>
	<button class="close-search"><span class="fa fa-arrow-up"></span></button>
	<form method="post" action="blog.html">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Search Popup -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
<!-- End Scroll To Top -->

</body>
</html>
@endsection