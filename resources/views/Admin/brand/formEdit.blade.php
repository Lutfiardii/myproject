@extends('Admin.layout.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Add Brand</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
                            <li class="breadcrumb-item"><a href="/admin/brands"><i class="fas fa-window-close"></i>Cancel</a></li>
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

                            <form class="custom-validation" method="POST" action="/admin/brands/update/{{$brand->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="brand_name">product Name</label>
                                    <input type="text" id="brand_name" name="brand_name" class="form-control @error('brand_name') has-error @enderror"  placeholder="name" value="{{ $brand->brand_name ?? '' }}">
                                    @error('brand_name')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-8">
                                    <label class="form-label" for="brand_logo">brand_logo</label>
                                    <input type="file" name="brand_logo" id="brand_logo" class="form-control @error('brand_logo') has-error @enderror" placeholder="brand_logo" onchange="preview('.imageDemo', this.files[0])">
                                    @error('brand_logo')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col-md mt-3">
                                        <input type="hidden" name="oldImage" value="{{ $brand->brand_logo }}">
                                        @if ($brand->brand_logo)
                                            <img src="{{ asset('imageslogo/'.$brand->brand_logo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo">   
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 col-md-8">
                                    <label class="form-label" for="brand_banner">brand_banner</label>
                                    <input type="file" name="brand_banner" id="brand_banner" class="form-control @error('brand_banner') has-error @enderror" placeholder="brand_banner" onchange="preview('.imageDemo', this.files[0])">
                                    @error('brand_banner')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col-md mt-3">
                                        <input type="hidden" name="oldImage" value="{{ $brand->brand_banner }}">
                                        @if ($brand->brand_banner)
                                            <img src="{{ asset('imagesbanner/'.$brand->brand_banner) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo">   
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">description</label>
                                    <div>
                                        <textarea id="elm1" name="description" rows="5" style="width: 100%" placeholder="Type here">{{ $product->description ?? '' }}</textarea>
                                    </div>
                                    @error('description')
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