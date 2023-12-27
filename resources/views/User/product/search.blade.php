<!-- Di dalam tampilan 'search' -->
@extends('User.layout.user')
@section('container')

<!DOCTYPE html>
<html>

<body>

<div class="page-wrapper">

    <!-- Content Side -->
    <div class="sidebar-page-container">
    <div class="auto-container">
    <div class="content-side col-lg-12 col-md-12 col-sm-12">
        <div class="shops-outer">
            <div class="row clearfix" id="product-list">
                @foreach ($products as $product)
                <!-- Shop Item -->
                <div class="shop-item col-lg-3 col-md-5 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="/detail/product/{{$product->id}}"><img src="{{ asset('imagesproduct/' . $product->product_img) }}" alt="" style="width: 305px; height: 285px; object-fit: contain; max-width: 100%; max-height: 100%" /></a>
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
    </div>
    </div>

</div>

</body>
</html>
@endsection
