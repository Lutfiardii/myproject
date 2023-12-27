
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Profile | User</title>
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

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content ms-0">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row d-flex justify-content-center">
                    <div class="col-xl-3">
                        <div class="user-sidebar">
                            <div class="card">
                                <div class="card-body">
                                    <div class="">
                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle text-muted fs-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="/profile/edit/{{ $customers->id }}">Edit profile</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-n4 position-relative">
                                        <div class="text-center">
                                            <img src="{{ asset('imagescustomer/' . $customers->customer_img) }}" alt="" class="avatar-xl rounded-circle img-thumbnail">

                                            <div class="mt-0">
                                                <h5 class="">{{$customers->customer_name}}</h5>
                                                <div>
                                                    {{$customers->email}}
                                                </div>
                                                <div>
                                                    {{$customers->no_telp}}
                                                </div>
                                                {{$customers->alamat}}                                         

                                                <div class="mt-4">
                                                    <a href="/" class="btn btn-primary waves-effect waves-light btn-sm"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="p-3 mt-3">
                                        <div class="row text-center">
                                            <div class="col-6 border-end">
                                                <div class="p-1">
                                                    <h5 class="mb-1">1,269</h5>
                                                    <p class="text-muted mb-0">Products</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-1">
                                                    <h5 class="mb-1">5.2k</h5>
                                                    <p class="text-muted mb-0">Followers</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->


                        </div>
                    </div>

                </div>
                <!--end row-->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

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