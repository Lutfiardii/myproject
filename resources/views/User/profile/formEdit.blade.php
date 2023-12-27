<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Profile | User : Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Lightbox css -->
    <link href="{{asset('assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Edit PROFILE</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">edit PROFILE</li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('profile', ['id' => $customer->id]) }}">
                                    <i class="fas fa-window-close"></i> Cancel
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <form class="custom-validation" method="POST" action="/profile/update/{{$customer->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="email">customer_name</label>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control @error('customer_name') has-error @enderror"  placeholder="customer_name" value="{{ $customer->customer_name ?? '' }}">
                                    @error('customer_name')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="email">email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') has-error @enderror"  placeholder="email" value="{{ $customer->email ?? '' }}">
                                    @error('email')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="email">password</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') has-error @enderror"  placeholder="password" value="{{ $customer->password ?? '' }}">
                                    @error('password')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="no_telp">No. Telepon</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control @error('no_telp') has-error @enderror" placeholder="No. Telepon" maxlength="15" value="{{ $customer->no_telp ?? '' }}">
                                    @error('no_telp')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-8">
                                    <label class="form-label" for="customer_img">customer_img</label>
                                    <input type="file" name="customer_img" id="customer_img" class="form-control @error('customer_img') has-error @enderror" placeholder="customer_img" onchange="preview('.imageDemo', this.files[0])">
                                    @error('customer_img')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col-md mt-3">
                                        <input type="hidden" name="oldImage" value="{{ $customer->customer_img }}">
                                        @if ($customer->customer_img)
                                            <img src="{{ asset('imagesCustomer/'.$customer->customer_img) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo">   
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label">alamat</label>
                                    <div>
                                        <textarea id="elm1" name="alamat" rows="5" style="width: 100%" placeholder="Type here">{{ $customer->alamat ?? '' }}</textarea>
                                    </div>
                                    @error('alamat')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                
                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- Magnific Popup-->
<!-- <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> -->

<!-- Tour init js-->
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/profile.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>