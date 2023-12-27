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
                            <li class="breadcrumb-item"><a href="/admin/product/categories"><i class="fas fa-window-close"></i>Cancel</a></li>
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

                            <form class="custom-validation" method="POST" action="{{('/admin/products/store/')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="product_name">product Name</label>
                                    <input type="text" id="product_name" name="product_name" class="form-control @error('product_name') has-error @enderror"  placeholder="name" value="{{ old('product_name') }}">
                                    @error('product_name')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>                              
                                
                                <input type="text" id="category_id" name="category_id" class="form-control @error('category_id') has-error @enderror"  placeholder="name" value="{{ $select_category }}" hidden>
                                <div class="mb-3">
                                    <label for="category_id">Select category</label>
                                    <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" disabled>
                                        <option selected disabled>category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if ($select_category == $category->id) selected @endif>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="brand_id">brand_id</label>
                                    <select class="form-select" aria-label="Default select example" name="brand_id" id="brand_id">
                                        <option selected disabled>Select brand</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                      </select>
                                      @error('brand_id')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-8">
                                    <label class="form-label" for="product_img">product_img</label>
                                    <input type="file" name="product_img" id="product_img" class="form-control @error('product_img') has-error @enderror" placeholder="product_img" onchange="preview('.imageDemo', this.files[0])">
                                    @error('product_img')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col-md mt-3">
                                        <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">description</label>
                                    <div>
                                        <textarea id="elm1" name="description" rows="5" style="width: 100%" placeholder="Type here">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="harga">harga</label>
                                    <input type="text" id="harga" name="harga" class="form-control @error('harga') has-error @enderror"  placeholder="name" value="{{ old('harga') }}">
                                    @error('harga')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="stok">stok</label>
                                    <input type="text" id="stok" name="stok" class="form-control @error('stok') has-error @enderror"  placeholder="name" value="{{ old('stok') }}">
                                    @error('stok')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">product_detail</label>
                                    <div>
                                        <textarea id="elm2" name="product_detail" rows="5" style="width: 100%" placeholder="Type here">{{ old('product_detail') }}</textarea>
                                    </div>
                                    @error('product_detail')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="trending">Select trending (optional)</label>
                                    <select class="form-select" aria-label="Default select example" name="trending" id="trending">
                                        <option selected disabled>optional</option>
                                        <option value="1">YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    @error('trending')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                @foreach ($categories as $catgr)
                                    @if ($select_category == $catgr->id)  
                                        @foreach ($catgr->attributes as $attribute)
                                            <div class="mb-3">
                                                <label class="form-label" for="product_attribute">{{$attribute->attribute_name}}</label>
                                                <input type="hidden" name="attribute_id[]" value="{{ $attribute->id }}">
                                                <select class="form-select" name="attribute_value_id[]">
                                                    <option selected disabled>Select {{ $attribute->attribute_name }}</option>
                                                    @foreach ($attribute->attributeValues as $value)
                                                        <option value="{{ $value->id }}">{{ $value->value_name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @error('product_name')
                                                    <p class="help-block text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach

                
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