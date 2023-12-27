@extends('Admin.layout.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Add Category</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                            <li class="breadcrumb-item"><a href="/admin/categories"><i class="fas fa-window-close"></i>Cancel</a></li>
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

                            <form class="custom-validation" method="POST" action="{{('/admin/categories/store/')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="category_name">category_name</label>
                                    <input type="text" id="category_name" name="category_name" class="form-control @error('category_name') has-error @enderror"  placeholder="name" value="{{ old('category_name') }}">
                                    @error('category_name')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-8">
                                    <label class="form-label" for="category_img">category_img</label>
                                    <input type="file" name="category_img" id="category_img" class="form-control @error('category_img') has-error @enderror" placeholder="category_img" onchange="preview('.imageDemo', this.files[0])">
                                    @error('category_img')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col-md mt-3">
                                        <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo">
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label">Pilih Attribute</label>

                                    <select name="attribute_id[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Pilih ...">
                                        <optgroup label="Sesuai dengan kebutuhan">
                                        @foreach ($attributes as $attribute)                                    
                                        <option value="{{$attribute->id}}">{{$attribute->attribute_name}}</option>
                                        @endforeach
                                        </optgroup>
                                    </select>
                                    @error('attribute_id')
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
@endsection

@section('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endsection