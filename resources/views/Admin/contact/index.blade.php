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
                                    <h6 class="page-title">Data tables Contact</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                        {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
                                        <li class="breadcrumb-item active" aria-current="page">Data tables</li>
                                    </ol>
                                </div>
                                <div class="d-sm-flex align-items-center justify-content-end mb-4 col-4">
                                    <a href="/admin/contacts/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-plus-circle"></i> Create</a>
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
                                                    <th>email</th>
                                                    <th>no_telp</th>
                                                    <th>alamat</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @php
                                                $no = 1
                                                @endphp
                                                @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$contact->email}}</td>
                                                    <td>{{$contact->no_telp}}</td>
                                                    <td>{{ strip_tags($contact->alamat) }}</td>
                                                    <td>
                                                        <a href="/admin/contacts/delete/{{ $contact->id }}" class="text-danger mx-2" onclick="return confirm('yakin untuk menghapus portfolio?')"><i class="fa fa-trash"></i></a>
                                                        <a href="/admin/contacts/edit/{{ $contact->id }}" class="text-warning ml-3"><i class="fas fa-edit"></i></a>
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
