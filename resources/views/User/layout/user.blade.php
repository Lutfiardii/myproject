<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PULSAKU CELL</title>
<!-- Stylesheets -->
<link href="{{asset('guests/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('guests/css/style.css')}}" rel="stylesheet">
<link href="{{asset('guests/css/responsive.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

<link rel="shortcut icon" href="{{asset('guests/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('guests/images/favicon.png')}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>

<div class="page-wrapper">
 	
 	<!-- Main Header -->
    <header class="main-header">
    	
        <!-- Header Lower -->
        <div class="header-lower">
            
			<div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center">
					
					<div class="logo-box d-flex align-items-center">
						
						<div class="nav-toggle-btn a-nav-toggle navSidebar-button">
							<span class="hamburger">
							  <span class="top-bun"></span>
							  <span class="meat"></span>
							  <span class="bottom-bun"></span>
							</span>
						  </div>
						
						<!-- Logo -->
						<div class="logo"><a href="/"><img src="{{asset('guests/images/logoPC.png')}}" alt="" title=""></a></div>
					</div>
					<div class="nav-outer clearfix">
						
						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="/">Home</a></li>
									<li><a href="/product">shop</a></li>
									<li class="dropdown"><a href="#">Blog</a>
										<ul>
											<li><a href="blog.html">Our Blog</a></li>
											<li><a href="blog-detail.html">Blog Single</a></li>
											<li><a href="not-found.html">Not Found</a></li>
										</ul>
									</li>
									@php
										$contacts = App\Contact::get()
									@endphp
									@foreach ($contacts as $contact)
										<li><a href="/contact/{{$contact->id}}">Contact us</a></li>	
									@endforeach
								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
						
					</div>
					
					<!-- Outer Box -->
					<div class="outer-box d-flex align-items-center">
						
						<!-- Options Box -->
						<div class="options-box d-flex align-items-center">
						
							<!-- Search Box -->
							<div class="search-box-outer">
								<div class="search-box-btn"><span class="flaticon-search-1"></span></div>
							</div>
							{{-- <form action="{{ route('search') }}" method="GET" class="search-form">
								<div class="input-group">
									<input type="text" name="query" class="form-control" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="search-button">
									<button class="btn btn-primary" type="submit" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</form> --}}
							
							{{-- <!-- User Box -->
							<a class="user-box flaticon-user-3" href="contact.html"></a> --}}
							<nav class="main-menu show navbar-expand-md">
								<div class="navbar-header">
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon-bar"></span>
									</button>
								</div>
							
								<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
									<ul class="navigation clearfix">
										<li class="dropdown">
											<a class="user-box flaticon-user-3" href="#">
												<i class="fa fa-user fs-5" aria-hidden="true"></i>
											</a>
											<ul>
												@if(!Empty(Auth::guard('customer')->user()->id))
												@php
													 $userId = Auth::guard('customer')->user()->id;
												@endphp
												<li><a href="/profile/{{$userId}}"><i class="fa fa-user"></i> Profile</a></li>
												<li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
												@else
												<li><a href="/user/login">login</a></li>
												@endif
											</ul>
										</li>
									</ul>
								</div>
							</nav>
							
							<!-- Like Box -->
							<div class="like-box">
								<a class="user-box flaticon-heart" href="contact.html"></a>
								<span class="total-like">0</span>
							</div>
							
						</div>
						
						@php
							$contacts = App\Contact::get()
						@endphp
						@foreach ($contacts as $contact)
						<!-- Cart Box -->
						<div class="cart-box">
							<div class="box-inner">
								<a href="shop-detail.html" class="icon-box">
									<span class="icon flaticon-bag"></span>
									<i class="total-cart">0</i>
								</a>
								Phone<br>
								<a class="phone" href="tel:+6281-710-850-239">{{$contact->no_telp}}</a>
							</div>
						</div>
						<!-- End Cart Box -->
						@endforeach
						
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
						
					</div>
					<!-- End Outer Box -->
					
				</div>
				
			</div>
        </div>
        <!-- End Header Lower -->
        
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
				<div class="d-flex justify-content-between align-items-center">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html" title=""><img src="images/logo-small.png" alt="" title=""></a>
					</div>
					
					<!-- Right Col -->
					<div class="right-box">
						<!-- Main Menu -->
						<nav class="main-menu">
							<!--Keep This Empty / Menu will come through Javascript-->
						</nav>
						<!-- Main Menu End-->
						
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					</div>
					
				</div>
            </div>
        </div>
		<!-- End Sticky Menu -->
    
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="images/mobile-logo.png" alt="" title=""></a></div>
				<!-- Search -->
				<div class="search-box">
					<form method="post" action="contact.html">
						<div class="form-group">
							<input type="search" name="search-field" value="" placeholder="SEARCH HERE" required>
							<button type="submit"><span class="icon flaticon-search-1"></span></button>
						</div>
					</form>
				</div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>
		<!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->
	
	<!-- Sidebar Cart Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget flaticon-multiply"></a>
				</div>
				<div class="sidebar-textwidget">
					
					<!-- Sidebar Info Content -->
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" alt="" title=""></a>
							</div>
							<div class="content-box">
								
								<h6>Contact info</h6>
								@php
									$contacts = App\Contact::get()
								@endphp
								@foreach ($contacts as $contact)
								<!-- List Style One -->
								<ul class="list-style-one">
									<li>
										<span class="icon flaticon-maps-and-flags"></span>
										<strong>Our office</strong>
										{!!$contact->alamat!!}
									</li>
									<li>
										<span class="icon flaticon-call-1"></span>
										<strong>Phone</strong>
										<a href="tel:+6281-710-850-239">{{$contact->no_telp}}</a><br>
										
									</li>
									<li>
										<span class="icon flaticon-mail"></span>
										<strong>Email</strong>
										<a href="mailto:lutfiardi873@gmail.com">{{$contact->email}}</a>
									</li>
								</ul>
								@endforeach
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->
    @yield('container')
	
	
	
	<!-- Main Footer -->
    <footer class="main-footer">
		<div class="pattern-layer-one" style="background-image: url(images/icons/pattern-3.png)"></div>
		<div class="pattern-layer-two" style="background-image: url(images/icons/vector-2.png)"></div>
		<div class="auto-container">
			
			<!-- Widgets Section -->
            <div class="widgets-section">
				<div class="row clearfix">
					<!-- Column -->
                    <div class="big-column col-lg-7 col-md-12 col-sm-12">
						<div class="row clearfix">
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<!-- Logo -->
									<div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
									<div class="text">4517 Washington Ave. Manchester, Kentucky 39495 ashington Ave. Manchester, </div>
									<ul class="contact-list">
										<li><span class="icon flaticon-map"></span>254 Lillian Blvd, Holbrook</li>
										<li><span class="icon flaticon-call"></span>1-800-654-3210</li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<h5>Find It Fast</h5>
									<ul class="page-list">
										<li><a href="#">Laptops & Computers</a></li>
										<li><a href="#">Cameras & Photography</a></li>
										<li><a href="#">Smart Phones & Tablets</a></li>
										<li><a href="#">Video Games & Consoles</a></li>
										<li><a href="#">TV & Audio</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Column -->
                    <div class="big-column col-lg-5 col-md-12 col-sm-12">
						<div class="row clearfix">
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<h5>Quick Links</h5>
									<ul class="page-list">
										<li><a href="#">Your Account</a></li>
										<li><a href="#">Returns & Exchanges</a></li>
										<li><a href="#">Return Center</a></li>
										<li><a href="#">Purchase Hisotry</a></li>
										<li><a href="#">App Download</a></li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget instagram-widget">
									<h5>Service us</h5>
									<ul class="page-list-two">
										<li><a href="#">Support Center</a></li>
										<li><a href="#">Term & Conditions</a></li>
										<li><a href="#">Shipping</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Help</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="d-flex justify-content-between align-items-center flex-wrap">
					<div class="copyright"><span>&copy; 2022</span> Powered by Theme. All Rights Reserved.</div>
					<div class="email-box">
						<a href="mailto:DumTheme@gmail.com"><span class="icon flaticon-mail"></span>DumTheme@gmail.com</a>
					</div>
					<div class="cards"><img src="images/icons/cards.png" alt="" /></div>
				</div>
			</div>
			
		</div>
	</footer>
	<!-- End Main Footer -->
	
</div>
<!-- End PageWrapper -->

<!-- Search Popup -->
<div class="search-popup">
    <div class="color-layer"></div>
    <button class="close-search"><span class="fa fa-arrow-up"></span></button>
    <form method="get" action="{{ route('search') }}">
        <div class="form-group">
            <input type="search" name="cari" value="" placeholder="Search Here" required="">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<!-- End Search Popup -->


<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{asset('guests/js/jquery.js')}}"></script>
<script src="{{asset('guests/js/popper.min.js')}}"></script>
<script src="{{asset('guests/js/bootstrap.min.js')}}"></script>
<script src="{{asset('guests/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('guests/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('guests/js/appear.js')}}"></script>
<script src="{{asset('guests/js/parallax.min.js')}}"></script>
<script src="{{asset('guests/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('guests/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('guests/js/owl.js')}}"></script>
<script src="{{asset('guests/js/wow.js')}}"></script>
<script src="{{asset('guests/js/swiper.min.js')}}"></script>
<script src="{{asset('guests/js/touchspin.js')}}"></script>
<script src="{{asset('guests/js/odometer.js')}}"></script>
<script src="{{asset('guests/js/mixitup.js')}}"></script>
<script src="{{asset('guests/js/backToTop.js')}}"></script>
<script src="{{asset('guests/js/jquery.marquee.min.js')}}"></script>
<script src="{{asset('guests/js/nav-tool.js')}}"></script>
<script src="{{asset('guests/js/jquery-ui.js')}}"></script>
<script src="{{asset('guests/js/script.js')}}"></script>

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</body>
</html>