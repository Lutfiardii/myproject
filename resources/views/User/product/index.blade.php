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
								<div class="results">
									Showing <span id="startResult">1</span>–<span id="endResult">12</span> of <span id="totalResults">54</span> results
								</div>
							</div>							
							<!-- Right Box -->
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
										<h6><a href="/detail/product/{{$product->id}}">{{ $product->product_name}}</a></h6>
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
						
						<!-- Category Widget -->
						<div class="sidebar-widget category-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h6>Product Catagories :</h6>
								</div>
								<!-- Category List -->
                                @php
									$category = App\Category::get();
								@endphp
								<ul class="category-list">
                                     @foreach ($category as $ctg)
                                        <li><a href="/categories/{{$ctg->id}}">{{$ctg->category_name}}<span>({{ $ctg->products->count() }})</span></a></li>
									@endforeach
								</ul>
								
							</div>
							<br>
							<!-- Colors Widget -->
							{{-- <div class="sidebar-widget colors-widget">
								<div class="widget-content">
									<!-- Sidebar Title -->
									<div class="sidebar-title">
										<h6>Colors</h6>
									</div>
									<div class="sel-colors">
										<div class="color-box"><a href=""><input type="radio" name="colors" checked id="color-one"></a><label style="background-color:#eb0707;" for="color-one"></label></div>
										<div class="color-box"><input type="radio" name="colors" id="color-two"><label style="background-color:#0b5fb5;" for="color-two"></label></div>
										<div class="color-box"><input type="radio" name="colors" id="color-three"><label style="background-color:#00a651;" for="color-three"></label></div>
										<div class="color-box"><input type="radio" name="colors" id="color-four"><label style="background-color:#fee496;" for="color-four"></label></div>
										<div class="color-box"><input type="radio" name="colors" id="color-five"><label style="background-color:#bc25bf;" for="color-five"></label></div>
										<div class="color-box"><input type="radio" name="colors" id="color-six"><label style="background-color:#000000;" for="color-six"></label></div>
									</div>
								</div>
							</div> --}}

							<div class="d-flex flex-wrap">
								<!-- Model -->
								<div class="sidebar-title">
									<h6>Warna :</h6>
								</div>
								<!-- Select Size -->
								@foreach ($attributes as $attribute) @if ($attribute->attribute_name == 'Color')
									@foreach ($attribute->attributeValues as $value)	
									<div class="select-size-box clearfix">
										<div class="select-box"><a href="/value/{{$value->id}}"><label for="radio-one">{{$value->value_name}}</label></a></div>
									</div>
									@endforeach
								@endif
								@endforeach
							</div>
						</div>
						
						<!-- Trending Widget -->
						<div class="sidebar-widget trending-widget">
							<div class="widget-content">
								<div class="content">
									<div class="vector-icon" style="background-image: url(images/icons/vector-3.png)"></div>
									<div class="title">Trending</div>
									<h4>2023 <span>Handphone</span> <br> Collection</h4>
									<a class="buy-btn theme-btn" href="#">Buy Now</a>
									<div class="icon">
										<img src="images/resource/lamp-4.png" alt="" />
									</div>
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
					<img src="{{asset('guests/images/gallery/1.jpg')}}" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/1.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="{{asset('guests/images/gallery/2.jpg')}}" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/1.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="{{asset('guests/images/gallery/3.jpg')}}" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/3.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="{{asset('guests/images/gallery/4.jpg')}}" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/4.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="{{asset('guests/images/gallery/5.jpg')}}" alt="" />
					<div class="overlay-box">
						<div class="overlay-inner">
							<a class="lightbox-image icon flaticon-instagram" href="images/gallery/5.jpg"></a>
						</div>
					</div>
				</div>
				
				<!-- Insta Gallery -->
				<div class="insta-gallery">
					<img src="{{asset('guests/images/gallery/6.jpg')}}" alt="" />
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

<script src="{{asset('guests/js/pagination.js')}}"></script>

</body>
</html>
@endsection