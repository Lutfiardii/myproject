@extends('User.layout.user')
@section('container')

<div class="page-wrapper">
	<!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
			<h2>Sebelum melakukan pembelian mohon register dulu</h2>
			<ul class="bread-crumb clearfix">
				<li>Kalo sudah register tinggal login</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

	<!-- Register Section -->
    <div class="register-section">
    	<div class="auto-container">
        	<div class="inner-container">
				<div class="row clearfix">
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<!-- Login Form -->
						<div class="styled-form">
							<h4>Sign Up</h4>
							<form method="post" action="/user/register/store" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label>Your Name</label>
									<input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="" placeholder="Enter your name*">
									@error('customer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
								</div>
								
								<div class="form-group">
									<label>Email address</label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Enter Email Adress">
									@error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
								</div>

								<div class="form-group">
									<label>New Password</label>
									<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="Create password">
									@error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
								</div>

								<div class="form-group">
									<label>Alamat</label>
									<div>
										<textarea id="elm1" name="alamat" rows="5" style="width: 100%" placeholder="Type here">{{ old('alamat') }}</textarea>
									</div>
									@error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    	</span>
                                    @enderror
								</div>

								<div class="form-group">
									<label class="form-label" for="customer_img">customer_img</label>
									<input type="file" name="customer_img" id="customer_img" class="form-control @error('customer_img') has-error @enderror" placeholder="customer_img" onchange="preview('.imageDemo', this.files[0])">
									@error('customer_img')
										<p class="help-block text-danger">{{ $message }}</p>
									@enderror
									<div class="col-md mt-3">
										<img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo">
									</div>
								</div>

								<div class="form-group">
									<label> no_telp</label>
									<input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="" placeholder="Create no_telp">
									@error('no_telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
								</div>

								<div class="form-group">
									<div class="check-box">
										<input type="checkbox" name="remember-password" id="type-1"> 
										<label for="type-1">I agree to al <a href="#">Terms</a> & <a href="#">Condition</a> and Feeds</label>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="theme-btn btn-style-one">
										Sign Up
									</button>
								</div>
							</form>
						</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<!-- Login Form -->
						<div class="styled-form">
							<h4>Login here</h4>
							<form method="post" action="/user/login/store">
								@csrf
								<div class="form-group">
									<label>Email address</label>
									<input type="email" class="form-control @error('emaillogin') is-invalid @enderror" name="emaillogin" value="" placeholder="Enter Email Adress">
									@error('emaillogin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
								</div>

								<div class="form-group">
									<label>New Password</label>
									<input type="password" class="form-control @error('passwordlogin') is-invalid @enderror" name="passwordlogin" value="" placeholder="Create password">
									@error('passwordlogin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
								</div>

								<div class="form-group">
									<div class="check-box">
										<input type="checkbox" name="remember-password" id="type-2"> 
										<label for="type-2">Remember Me?</label>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="theme-btn btn-style-one">
										Login here
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Register Section -->
	
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

@endsection