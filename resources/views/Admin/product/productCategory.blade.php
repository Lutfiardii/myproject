@extends('Admin.layout.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Add Product</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            <li class="breadcrumb-item"><a href="/admin/products"><i class="fas fa-window-close"></i>Cancel</a></li>
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

                            <form class="custom-validation" method="POST" action="{{('/admin/product/categories/')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="category_id">Select category</label>
                                    <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                                        <option selected disabled>category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Next
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
@endsection

@section('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endsection