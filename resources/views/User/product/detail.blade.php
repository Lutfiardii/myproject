@extends('User.layout.user')
@section('container')

<!DOCTYPE html>
<html>

<body>

<div class="page-wrapper">
	<!-- Page Title -->
    {{-- <section class="page-title">
        <div class="auto-container">
			<h2>Shop Detail</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="index.html">Home</a></li>
				<li>Pages</li>
				<li>Shop Details</li>
			</ul>
        </div>
    </section> --}}
    <!-- End Page Title -->
	
	<!-- Shop Detail Section -->
	<section class="shop-detail-section">
		<div class="auto-container">
			<!-- Upper Box -->
			<div class="upper-box">
				<div class="row clearfix">
					<!-- Gallery Column -->
					<div class="gallery-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="carousel-outer">
                                <!-- Swiper -->
                                <div class="swiper-container content-carousel">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <figure class="ms-5 mt-2"><a href="{{ asset('imagesproduct/' . $products->product_img) }}" class="lightbox-image"><img src="{{ asset('imagesproduct/' . $products->product_img) }}" width="573px" alt=""></a></figure>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-container thumbs-carousel">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            {{-- <figure class="thumb"><img src="images/resource/products/36.png" alt=""></figure> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<h3>Accesories {{$products->product_name}}</h3>
							<!-- Rating -->
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="light fa fa-star"></span>
								<i>(4 customer review)</i>
							</div>
							<!-- Price -->
							<div><strong>Rp:{{$products->harga}}</strong></div>
							<div class="text">{!!$products->description!!}</div>

							<div class="d-flex flex-wrap">
								<!-- Model -->
								<div class="model">
									<span class="model-title">Warna :</span>
								</div>
								<!-- Select Size -->
								@foreach ($products->attributes as $attribute)
									@if ($attribute->id == 2)
										@foreach ($products->attributeValues->where('attribute_id',2) as $value)
											<div class="select-size-box clearfix">
												<div class="select-box"><input type="radio" name="payment-group" id="radio-one" checked><label for="radio-one">{{$value->value_name}}</label></div>
											</div>
										@endforeach
									@endif
								@endforeach
							</div>
							
							<!-- Categories -->
							<div class="categories"><span>Categories :</span>{{$products->category->category_name}}</div>
							
							{{-- <!-- Tags -->
							<div class="categories"><span>Tags:</span>
							@foreach ($products->attributes as $attribute)
									@if ($attribute->id !== 2)
										@foreach ($products->attributeValues as $value)
										{{$value->value_name}}
										@endforeach
									@endif
							@endforeach
							</div> --}}

							<div class="attribute"><span>Spesifikasi:</span>
								@php
									$printedAttributes = [];
								@endphp
							
							@foreach ($products->attributes as $attribute)
							@if ($attribute->id != 2 && !in_array($attribute->id, $printedAttributes))
								@foreach ($products->attributeValues->reject(function ($value) use ($attribute) {
									return $value->attribute_id != $attribute->id;
								}) as $value)
									{{$value->value_name}},
								@endforeach
								@php
									$printedAttributes[] = $attribute->id;
								@endphp
							@endif
						@endforeach
						
							</div>
							
							
							
							<!-- Social Box -->
							<ul class="social-box">
								<li class="share">Share:</li>
								<li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
								<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
								<li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
								<li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
							</ul>
						<form action="/cart/store/{{$products->id}}" method="POST">
								@csrf
								{{-- <input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}"> --}}
								<input type="hidden" name="customer_id" value="{{ auth('customer')->user() ? auth('customer')->user()->id : '' }}">
								<input type="hidden" name="product_id" value="{{$products->id}}">
								<input type="hidden" name="subtotal" value="{{ $products->harga }}" />
							<div class="d-flex align-items-center flex-wrap">
							
								<!-- Button Box -->
								<div class="button-box">
									<button type="submit" class="theme-btn btn-style-one">
										Add to cart
									</button>
								</div>
								
								<!-- Quantity Box -->
								<div class="quantity-box">
									<div class="item-quantity">
										<input class="qty-spinner" type="text" value="1" name="kuantitas">
									</div>
								</div>
								
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Upper Box -->
			
			<!-- Lower Box -->
			<div class="lower-box">
				
				<!-- Product Info Tabs -->
				<div class="product-info-tabs">
					<!-- Product Tabs -->
					<div class="prod-tabs tabs-box">
					
						<!-- Tab Btns -->
						<ul class="tab-btns tab-buttons clearfix">
							<li data-tab="#prod-details" class="tab-btn active-btn">Product Details</li>
							<li data-tab="#prod-review" class="tab-btn">Review (02)</li>
							<li data-tab="#prod-faq" class="tab-btn">Faq</li>
						</ul>
						
						<!-- Tabs Container -->
						<div class="tabs-content">
							
							<!-- Tab / Active Tab -->
							<div class="tab active-tab" id="prod-details">
								<div class="content">
									<h5>Deskripsi</h5>
									<div class="row clearfix">
										<div class="col-lg-6 col-md-12 col-sm-12">
											<ul class="list-one">
												<li><h1>{!!$products->product_detail!!}</h1></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							<!--Tab-->
							<div class="tab" id="prod-review">
								<h2 class="title">2 Reviews For win Your Friends</h2>
								<!--Reviews Container-->
								<div class="comments-area">
									<!--Comment Box-->
									<div class="comment-box">
										<div class="comment">
											<div class="author-thumb"><img src="images/resource/author-1.jpg" alt=""></div>
											<div class="comment-inner">
												<div class="comment-info clearfix">Steven Rich – March 17, 2022:</div>
												<div class="rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star light"></span>
												</div>
												<div class="text">How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</div>
											</div>
										</div>
									</div>
									<!--Comment Box-->
									<div class="comment-box reply-comment">
										<div class="comment">
											<div class="author-thumb"><img src="images/resource/author-2.jpg" alt=""></div>
											<div class="comment-inner">
												<div class="comment-info clearfix">William Cobus – April 21, 2022:</div>
												<div class="rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star-half-empty"></span>
												</div>
												<div class="text">There anyone who loves or pursues or desires to obtain pain itself, because it is pain sed, because occasionally circumstances occur some great pleasure.</div>
											</div>
										</div>
									</div>
									
								</div>

								
							</div>
							
							<!-- Tab -->
							<div class="tab" id="prod-faq">
								<div class="content">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate vestibulum Phasellus rhoncus, dolor eget viverra pretium, dolor tellus aliquet nunc, vitae ultricies erat elit eu lacus. Vestibulum non justo consectetur, cursus ante, tincidunt sapien. Nulla quis diam sit amet turpis interdum accumsan quis nec enim. Vivamus faucibus ex sed nibh egestas elementum. Mauris et bibendum dui. Aenean consequat pulvinar luctus. Suspendisse consectetur tristique tortor</p>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				<!--End Product Info Tabs-->
				
			</div>
			<!-- End Lower Box -->
			
		</div>
	</section>
	<!-- End Shop Page Section -->
	
	<!-- Products Section Six -->
	<section class="products-section-six">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h4><span>Populer</span> Products For You !</h4>
			</div>
			<div class="row clearfix">
				
				<!-- Shop Item Two -->
				<div class="shop-item-two col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="shop-detail.html"><img src="images/resource/products/25.png" alt="" /></a>
							<div class="options-box">
								<ul class="option-list">
									<li><a class="flaticon-resize" href="shop-detail.html"></a></li>
									<li><a class="flaticon-heart" href="shop-detail.html"></a></li>
									<li><a class="flaticon-shopping-cart-2" href="shop-detail.html"></a></li>
								</ul>
							</div>
						</div>
						<div class="content">
							<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
							<div class="lower-box">
								<div class="price"><span>$239.52</span> $362.00</div>
								<!-- Select Size -->
								<div class="select-amount clearfix">
									<div class="select-box"><input type="radio" name="payment-group" id="radio-one" checked><label for="radio-one">32</label></div>
									<div class="select-box not-available"><label for="radio-two">34</label></div>
									<div class="select-box"><input type="radio" name="payment-group" id="radio-three"><label for="radio-three">36</label></div>
								</div>
								<!-- Select Size -->
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Products Section Six -->
	
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

</body>
</html>
@endsection