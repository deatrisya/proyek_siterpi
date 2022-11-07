@extends('layouts.app')
@section('title', 'User')
@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data User</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="{{ route('user.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <label for="inputFoto" class="form-label">Foto</label>
                    <br>
                    <input name="foto" type="file" class="form-control" id="formFile" required>
                    @error('foto')
                    <small class="text-danger foto">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="inputNama" class="form-label">Nama</label>
                    <br>
                    <input name="name" type="text" class="form-control text-capitalize" id="formFile" value="{{old('name')}}" required>
                    @error('name')
                    <small class="text-danger name">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="inputUsername" class="form-label">Username</label>
                    <br>
                    <input name="username" type="text" class="form-control" id="formFile" value="{{old('username')}}" required>
                    @error('username')
                    <small class="text-danger username">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="inputPassword" class="form-label">Password</label>
                    <br>
                    <input name="password" type="password" class="form-control" id="formFile" required>
                    @error('password')
                    <small class="text-danger password">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

@endsection
@section('js')
    <script>
        $('#menu-user').removeClass('collapsed');
    </script>
@endsection
