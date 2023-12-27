@extends('Admin.layout.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Edit Contact</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">edit Contact</li>
                            <li class="breadcrumb-item"><a href="/admin/contacts"><i class="fas fa-window-close"></i>Cancel</a></li>
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

                            <form class="custom-validation" method="POST" action="/admin/contacts/update/{{$contact->id}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="email">email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') has-error @enderror"  placeholder="email" value="{{ $contact->email ?? '' }}">
                                    @error('email')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="no_telp">No. Telepon</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control @error('no_telp') has-error @enderror" placeholder="No. Telepon" maxlength="15" value="{{ $contact->no_telp ?? '' }}">
                                    @error('no_telp')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label">alamat</label>
                                    <div>
                                        <textarea id="elm1" name="alamat" rows="5" style="width: 100%" placeholder="Type here">{{ $contact->alamat ?? '' }}</textarea>
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
@endsection