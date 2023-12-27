@extends('Admin.layout.admin')

@section('content')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Data tables</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                        {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">Data tables</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        {{-- <h4 class="card-title">Buttons example</h4>
                                        <p class="card-title-desc">anjay mabar.
                                        </p> --}}

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th>Name</th>
                                                    <th>email</th>
                                                    <th>customer img</th>
                                                    <th>no_telp</th>
                                                    <th>alamat</th>
                                                    <th>status</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @php
                                                $no = 1
                                                @endphp
                                                @foreach ($customers as $customer)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$customer->customer_name}}</td>
                                                    <td>{{$customer->email}}</td>
                                                    <td class="text-center"><img src="{{ asset('imagesCustomer/' . $customer->customer_img) }}" alt="Customer Image" width="100"></td>
                                                    <td>{{$customer->no_telp}}</td>
                                                    <td>{{ strip_tags($customer->alamat) }}</td>
                                                    <td>
                                                        @if ($customer->status)
                                                            Aktif
                                                        @else
                                                            Nonaktif
                                                        @endif
                                                    </td>
                                                </tr>                                                
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


            </div>
            <!-- end main content-->
@endsection                            

@section('script')
        <!-- Required datatable js -->
        <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script> 

@endsection
