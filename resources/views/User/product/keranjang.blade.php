@extends('User.layout.user')
@section('container')

<!DOCTYPE html>
<html>

<body>

<div class="page-wrapper">
	
	<!-- Shoping Cart Section -->
	<section class="shoping-cart-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Cart Column -->
				<div class="cart-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						
						<!--Cart Outer-->
						<div class="cart-outer">
							<div class="table-outer">
								{{-- <table class="cart-table">
									<thead class="cart-header">
										<tr>
											<th class="prod-column">product</th>
											<th>&nbsp;</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
										</tr>
									</thead>
									
									<tbody>
									
										<tr>
											<td colspan="2" class="prod-column">
												<div class="column-box">
													<figure class="prod-thumb">
														<span class="cross-icon flaticon-cancel-1"></span>
														<a href="#"><img src="images/resource/products/40.png" alt=""></a>
													</figure>
													<h6 class="prod-title">Logech Headphone</h6>
													<div class="prod-text">Color : Brown <br> Quantity : 2</div>
												</div>
											</td>
											
											<td class="price">$32.00</td>
											<!-- Quantity Box -->
											<td class="quantity-box">
												<div class="item-quantity">
													<input class="qty-spinner" type="text" value="1" name="quantity">
												</div>
											</td>
											<td class="sub-total">£219.00</td>
										</tr>
										
									</tbody>
								</table> --}}
								<table class="cart-table">
									<thead class="cart-header">
										<tr>
											<th class="prod-column">Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cartItems as $cartItem)
											<tr>
												<td class="prod-column">
													<form method="post" action="{{ route('cart.delete', ['id' => $cartItem->id]) }}">
														@csrf
														<button type="submit" style="font-size: 20px; color: red;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
													</form>
													<div class="column-box">
														<figure class="prod-thumb">
															<img src="{{ asset('imagesproduct/' . $cartItem->product->product_img) }}" alt="{{ $cartItem->product->product_name }}">
														</figure>
														<h6 class="prod-title">{{ $cartItem->product->product_name }}</h6>
													</div>
												</td>
												{{-- <td class="price">${{ $cartItem->product->harga }}</td>
												<td class="quantity-box">
													<div class="item-quantity">
														<input class="qty-spinner" type="text" value="{{ $cartItem->kuantitas }}" name="kuantitas">
													</div>
												</td>
												<td class="sub-total">${{ $cartItem->subtotal }}</td> --}}
												<td class="price" id="price-{{ $cartItem->product->id }}">${{ $cartItem->product->harga }}</td>
												<td class="quantity-box">
													<div class="item-quantity">
														<input class="qty-spinner" type="number" value="{{ $cartItem->kuantitas }}" name="kuantitas" id="quantity-{{ $cartItem->product->id }}">
													</div>
												</td>
												<td class="sub-total" id="subtotal-{{ $cartItem->product->id }}">${{ number_format($cartItem->kuantitas * str_replace(['$', ','], '', $cartItem->product->harga), 2) }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
								
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Total Column -->
				<div class="total-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
					
						<!-- Cart Total Outer -->
						<div class="cart-total-outer">
							<!-- Title Box -->
							<div class="title-box">
								<h6>Cart Totals</h6>
							</div>
							<div class="cart-total-box">
								<ul class="cart-totals">
									{{-- <li>Subtotals : <span>£381.00</span></li> --}}
									<li>Totals : <span class="sub-total" id="subtotal-{{ $cartItem->product->id }}">${{ number_format($cartItem->kuantitas * str_replace(['$', ','], '', $cartItem->product->harga), 2) }}</span></li>
								</ul>
								{{-- <div class="check-box">
									<input type="checkbox" name="remember-password" id="type-1"> 
									<label for="type-1">Shipping & taxes calculated at checkout</label>
								</div> --}}
								<!-- Buttons Box -->
								<div class="buttons-box">
									<a href="contact.html" class="theme-btn proceed-btn">
										Procced To Cheackout
									</a>
								</div>
							</div>
						</div>
						
						<!-- Shipping Total Outer -->
						<div class="shipping-outer">
							<!-- Title Box -->
							<div class="title-box">
								{{-- <h6>Calculate Shipping</h6> --}}
								<h6>Alamat pengiriman</h6>
							</div>
							<div class="cart-shipping-box">
								<ul class="shipping-list">
									<li>{{$cartItem->customer->alamat}}</li>
									{{-- <li>Mirpur Dohs Dhaka-1200</li>
									<li>Postal Code</li> --}}
								</ul>
								<!-- Buttons Box -->
								{{-- <div class="buttons-box">
									<a href="contact.html" class="theme-btn btn-style-one">
										Calculate Shiping
									</a>
								</div> --}}
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Shoping Cart Section -->
	
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