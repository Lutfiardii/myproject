@extends('User.layout.user')
@section('container')

<!-- Main Section -->
<section class="main-slider">
    <div class="main-slider-carousel owl-carousel owl-theme">
        
        <!-- Slide One -->
        @foreach ($brands as $brand)
        <div class="slide">
            <!-- Ct Dot Animated -->
            <div class="ct-dot-animated">
                <div class="ct-dot-container">
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                    <div class="ct-dot-item">
                        <span></span>
                    </div>
                </div>
            </div>
            <!-- End Ct Dot Animated -->
            <div class="image-layer" style="background-image : url({{ asset('imagesbanner/' . $brand->brand_banner) }});height:100%;"></div>
            {{-- <div class="auto-container">
                
                <!-- Content Column -->
                <div class="content-box">
                    <div class="box-inner">
                        <div class="vector-icon" style="background-image: url({{asset('guests/images/main-slider/vector-1.png')}})"></div>
                        <div class="vector-icon-two" style="background-image: url({{asset('guests/images/main-slider/vector-2.png')}})"></div>
                        <div class="vector-icon-three" style="background-image: url({{asset('guests/images/main-slider/vector-3.png')}})"></div>
                        <div class="sale-box">
                            SALE
                            <span>30<i>% OFF</i></span>
                        </div>
                        <div class="title">2022 Collection</div>
                        <h1>Digital <br> Collection</h1>
                        <div class="price">Starting From <span>$560.99</span></div>
                        <a href="shop-detail.html" class="shop-now">Shop Now</a>
                        <!-- Arrival Box -->
                        <a href="shop.html" class="arrival-box">New Arrival</a>
                        <!-- Arrival Box -->
                    </div>
                </div>
                
            </div> --}}
        </div>
        @endforeach
        <!-- End Slide One -->
        
    </div>
</section>
<!-- End Main Section -->

<!-- Featured Section -->
<section class="featured-section">
    <div class="vector-layer" style="background-image: url(images/icons/vector-1.png)"></div>
    <div class="vector-layer-two" style="background-image: url(images/icons/feature.png)"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
            
                <!-- Feature Block -->
                <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <div class="icon flaticon-fast"></div>
                            <strong>Free Shipping</strong>
                            <div class="text">Free shipping over $100</div>
                        </div>
                    </div>
                </div>
                
                <!-- Feature Block -->
                <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <div class="icon flaticon-padlock"></div>
                            <strong>Payment Secure</strong>
                            <div class="text">Got 100% Payment Safe</div>
                        </div>
                    </div>
                </div>
                
                <!-- Feature Block -->
                <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <div class="icon flaticon-headphones-1"></div>
                            <strong>Support 24/7</strong>
                            <div class="text">Top quialty 24/7 Support</div>
                        </div>
                    </div>
                </div>
                
                <!-- Feature Block -->
                <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <div class="icon flaticon-wallet"></div>
                            <strong>100% Money Back</strong>
                            <div class="text">Cutomers Money Backs</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- End Featured Section -->

<!-- Products Section -->
{{-- <section class="products-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <h4><span>Populer</span> Products For You !</h4>
        </div>
        <div class="four-item-carousel owl-carousel owl-theme">
            
            <!-- Shop Item -->
            <div class="shop-item">
                <div class="inner-box">
                    <div class="image">
                        <a href="shop-detail.html"><img src="{{asset('guests/images/resource/products/1.png')}}" alt="" /></a>
                        <span class="tag flaticon-heart"></span>
                        <div class="cart-box text-center">
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="light fa fa-star"></span>
                        </div>
                        <h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price"><span>$239.52</span> $362.00</div>
                            <!-- Quantity Box -->
                            <div class="quantity-box">
                                <div class="item-quantity">
                                    <input class="qty-spinner" type="text" value="1" name="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section> --}}
<!-- End Products Section -->

<!-- Brand Section -->
<section class="brand-section">
    <div class="outer-container">
        <div class="animation_mode">
            @foreach ($brands as $brand)
				<h1>{{$brand->brand_name}}</h1>
				<img src="{{ asset('imageslogo/' . $brand->brand_logo) }}"height="120px" width="120px" alt="" />
			@endforeach
        </div>
    </div>
</section>
<!-- End Brand Section -->

<!-- Products Section Two -->
<section class="products-section-two">
    <div class="bottom-white-border"></div>
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h4><span>Category</span> For You !</h4>
        </div>
        <div class="inner-container">
            <div class="single-item-carousel owl-carousel owl-theme">
                
                <!-- Slide -->
                <div class="slide">
                    <div class="row clearfix">
                    
                        <!-- Product Block Four -->
							@foreach ($categories as $category)
							<div class="product-block-four col-lg-3 col-md-6 col-sm-6">
								<div class="inner-box d-flex justify-content-between align-items-center flex-wrap">
									<div class="image">
										<span class="number" style="left: 100%">{{$loop->iteration}}</span>
										<a href="/categories/{{$category->id}}"><img src="{{ asset('imagescategory/' . $category->category_img) }}"  style="width: 90px; height :98px" alt="" /></a>
									</div>
									<div class="content">
										<h6><a href="/categories/{{$category->id}}">{{$category->category_name}}</a></h6>
										<div class="total-products">({{ $category->products->count() }} Product)</div>
									</div>
								</div>
							</div>
							@endforeach
                        
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</section>
<!-- End Products Section Two -->

<!-- Counter Section -->
<section class="counter-section">
    <div class="auto-container">
        <div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
            
            <!-- Shipping Box -->
            <div class="shipping-box">
                <div class="inner-box">
                    Free <span class="theme_color">Shipping</span>
                    <div class="order">On all Order</div>
                </div>
            </div>
            
            <!-- Arrow -->
            <div class="arrow">
                <img src="images/icons/arrow.png" alt="" />
            </div>
            
            <!-- Counter Boxed -->
            <div class="counter-boxed">
                <div class="row clearfix">
                
                    <!-- Counter Column -->
                    <div class="counter-block col-lg-6 col-md-6 col-sm-6">
                        <div class="inner-box d-flex align-items-center">
                            <div class="counter"><span class="odometer" data-count="12"></span>k</div>
                            <div class="counter-text">Furniture Product For Home</div>
                        </div>
                    </div>
                    
                    <!-- Counter Column -->
                    <div class="counter-block col-lg-6 col-md-6 col-sm-6">
                        <div class="inner-box d-flex align-items-center">
                            <div class="counter"><span class="odometer" data-count="120"></span>k</div>
                            <div class="counter-text">Our Satiesfiyed Clients</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- End Counter Boxed -->
            
        </div>
    </div>
</section>
<!-- End Counter Section -->

<!-- Products Section Three -->
<section class="products-section-three">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <h4><span>Products </span> your choich !</h4>
        </div>
        
        <!-- MixitUp Galery -->
        <div class="mixitup-gallery">
            
            <!-- Filter -->
            <div class="filters">
                <ul class="filter-tabs">
                    <li class="active filter" data-role="button" data-filter="all">Trending</li>
                    <li class="filter" data-role="button" data-filter=".bestseller">Best Seller</li>
                    <li class="filter" data-role="button" data-filter=".music">music</li>
                    <li class="filter" data-role="button" data-filter=".photography">photography</li>
                    <li class="filter" data-role="button" data-filter=".sports">sports</li>
                </ul>
            </div>
            
            <div class="filter-list row clearfix">
                
                <!-- Shop Item -->
					@foreach ($products as $product) 
                        @if ($product->trending == 1)
					<div class="shop-item mix col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							@if($product->trending == 1) 
							<div class="image">
								<a href="/detail/product/{{$product->id}}"><img src="{{ asset('imagesproduct/' . $product->product_img) }}" alt="" style="width: 305px; height: 285px; object-fit:contain; max-width:100%; max-height:100%" /></a>
								
								<div class="cart-box text-center">
									<a class="cart" href="/detail/product/{{$product->id}}">Detail product</a>
								</div>
							</div>
							<div class="lower-content">
								<h6><a href="shop-detail.html">{{ $product->product_name}}</a></h6>
								<span class="tag flaticon-heart"></span>
								<div class="d-flex justify-content-between align-items-center">
									<div>{{ $product->harga}}</div>
								</div>
							</div>
							@endif
						</div>
					</div>
                        @endif
					@endforeach
            </div>
            
            <!-- Button Box -->
            <div class="button-box text-center">
                <a href="/product" class="theme-btn btn-style-one">
                    Shop Now <span class="icon flaticon-right-arrow"></span>
                </a>
            </div>
            
        </div>
    </div>
</section>
<!-- End Products Section Three -->

<!-- Sponsors Section -->
<section class="sponsors-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="sponsors-outer">
                <!-- Sponsors Carousel -->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/1.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/2.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/3.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/4.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/5.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/1.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/2.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/3.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/4.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/5.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/1.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('guests/images/clients/2.png')}}" alt=""></a></figure></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Sponsors Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="pattern-layer" style="background-image: url(images/background/pattern-3.png)"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="pattern-layer-two" style="background-image: url(images/background/pattern-4.png)"></div>
            <div class="vector-layer" style="background-image: url(images/background/pattern-2.png)"></div>
            <div class="single-item-carousel owl-carousel owl-theme">
                
                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="row clearfix">
                            <!-- Image Column -->
                            <div class="image-column col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="arrow-layer" style="background-image: url(images/icons/arrow-2.png)"></div>
                                    <div class="image">
                                        <img src="images/resource/author-2.jpg" alt="" />
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
                                            <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
                                            <li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
                                            <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->
                            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div class="text">The most <span>advanced</span> revenue than this. I will refer everyone I know I like Level more and more each day because it makes my life a lot easier. It really saves me time and effort.</div>
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="row clearfix">
                            <!-- Image Column -->
                            <div class="image-column col-lg-4 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="arrow-layer" style="background-image: url(images/icons/arrow-2.png)"></div>
                                    <div class="image">
                                        <img src="images/resource/author-2.jpg" alt="" />
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
                                            <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
                                            <li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
                                            <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->
                            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div class="text">The most <span>advanced</span> revenue than this. I will refer everyone I know I like Level more and more each day because it makes my life a lot easier. It really saves me time and effort.</div>
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->

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
@endsection