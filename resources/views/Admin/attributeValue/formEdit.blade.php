@extends('Admin.layout.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Add Attributes</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Attributes</li>
                            <li class="breadcrumb-item"><a href="/admin/attributeValues/{{$attribute->id}}"><i class="fas fa-window-close"></i>Cancel</a></li>
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
                            <form action="{{ route('valueupdate', ['id' => $attribute->id]) }}" method="post">
                                @csrf
                                
                                <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                
                                <div class="mb-3">
                                    <label class="form-label" for="edit_value_name">value_name</label>
                                    <input type="text" id="edit_value_name" name="value_name" class="form-control @error('value_name') has-error @enderror" placeholder="name" value="{{ $value->value_name ?? '' }}">
                                    <input type="hidden" name="value_id" value="{{ $value->id }}">
                                    @error('value_name')
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