@extends('Admin.layout.admin')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Edit admin</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Mahasiswa</li>
                            <li class="breadcrumb-item"><a href="/admin/administrator"><i class="fas fa-window-close"></i>Cancel</a></li>
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

                            <form class="custom-validation" method="POST" action="/admin/administrator/update/{{$admin->id}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') has-error @enderror"  placeholder="name" value="{{ $admin->name ?? '' }}">
                                    @error('name')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tipe">Select tipe (optional)</label>
                                    <select class="form-select" aria-label="Default select example" name="tipe" id="tipe">
                                        <option value="" @if ($admin->tipe === '') @endif>optional</option>
                                        <option value="superAdmin" @if ($admin->tipe === 'superAdmin') selected @endif>Super Admin</option>
                                        <option value="admin" @if ($admin->tipe === 'admin') selected @endif>Admin</option>
                                    </select>
                                    @error('tipe')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="email">email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') has-error @enderror"  placeholder="email" value="{{ $admin->email ?? '' }}">
                                    @error('email')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror"  placeholder="password">
                                    @error('password')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="no_telp">No. Telepon</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control @error('no_telp') has-error @enderror" placeholder="No. Telepon" maxlength="15" value="{{ $admin->no_telp ?? '' }}">
                                    @error('no_telp')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                
                                <div class="mb-3">
                                    <label class="form-label">alamat</label>
                                    <div>
                                        <textarea id="elm1" name="alamat" rows="5" style="width: 100%" placeholder="Type here">{{ $admin->alamat ?? '' }}</textarea>
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