@extends('User.layout.user')
@section('container')

<!DOCTYPE html>
<html>

<body>

<div class="page-wrapper">
	
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
					<!-- Filter Box -->
					<div class="filter-box">
						<div class="d-flex justify-content-between align-items-center flex-wrap">
							<!-- Left Box -->
							<div class="left-box d-flex align-items-center">
								<div class="results">Showing 1–12 of 54 results</div>
							</div>
							<div class="filter-box">
								<div class="right-box d-flex">
									<div class="form-group">
										<select name="currency" class="custom-select-box">
											<option>Recently Added</option>
											<option>Added 01</option>
											<option>Added 02</option>
											<option>Added 03</option>
											<option>Added 04</option>
										</select>
									</div>
								</div>
							</div>
							<!-- Right Box -->
						</div>
					</div>
					<!-- End Filter Box -->
					
					<div class="shops-outer">
						<div class="row clearfix" id="product-list">
							@foreach ($products as $product)
							<!-- Shop Item -->
							<div class="shop-item col-lg-4 col-md-4 col-sm-12">
								<div class="inner-box">
									<div class="image">
                                        <a href="/detail/product/{{$product->id}}"><img src="{{ asset('imagesproduct/' . $product->product_img) }}" alt="" style="width: 305px; height: 285px; object-fit:contain; max-width:100%; max-height:100%" /></a>
										<div class="options-box">
											<ul class="option-list">
												<li><a class="flaticon-resize" href="shop-detail.html"></a></li>
												<li><a class="flaticon-heart" href="shop-detail.html"></a></li>
												{{-- <li><a class="flaticon-shopping-cart-2" href="/cart/{{$product->id}}"></a></li> --}}
											</ul>
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
										<h6><a href="shop-detail.html">{{ $product->product_name}}</a></h6>
										<div class="d-flex justify-content-between align-items-center">
											<div>{{ $product->harga}}<span class="ms-5">stok:{{ $product->stok}}</span></div>
											<!-- Quantity Box -->
											{{-- <div class="quantity-box">
												<div class="item-quantity">
													<input class="qty-spinner" type="text" value="1" name="quantity">
												</div>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					
						<!-- Styled Pagination -->
						<ul class="styled-pagination text-center" id="pagination">
							<li class="prev"><button onclick="prevPage()"><span class="fa fa-angle-double-left"></span></button></li>
							<li><button onclick="changePage(1)">1</button></li>
							<li><button onclick="changePage(2)">2</button></li>
							<li class="next"><button onclick="nextPage()"><span class="fa fa-angle-double-right"></span></button></li>
						  </ul>
						<!-- End Styled Pagination -->
					
					</div>
					
				</div>
				
				<!-- Sidebar Side -->
                	<div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                		<aside class="sidebar sticky-top">
								<!-- Colors Widget -->
							<div class="sidebar-widget colors-widget">
								<div class="widget-content">
									<!-- Sidebar Title -->
								  <div class="d-flex flex-wrap">
									<div class="sidebar-title">
										<h6>Colors :</h6>
									</div>
									@foreach ($attributes as $attribute)
									 	@if ($attribute->attribute_name == 'Color')
											@foreach ($attribute->attributeValues as $value)	
									<div class="select-size-box clearfix">
										<div class="select-box"><a href="/value/{{$value->id}}"><label for="radio-one">{{$value->value_name}}</label></a></div>
									</div>
											@endforeach
										@endif
									@endforeach
								  </div>
								</div>
							</div>
						</aside>
					</div>
				
			</div>
		</div>
	</div>
	
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

<script src="{{asset('guests/js/pagination.js')}}"></script>

</body>
</html>
@endsection