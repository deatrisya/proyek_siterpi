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
            <h5 class="card-title">Edit Data User</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="{{ route('user.update',$user->id) }}">
                @method('PUT')
                @csrf
                <div class="col-md-3">
                    <label for="inputFoto" class="form-label">Foto</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="{{ $user->foto }}" readonly>
                    @error('foto')
                        <small class="text-danger error_nis">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="formNama" name="formNama" value="{{ $user->nama }}" readonly>
                    @error('nama')
                        <small class="text-danger error_nis">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="formUsername" name="formUsername" value="{{ $user->username }}" readonly>
                    @error('username')
                        <small class="text-danger error_nis">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="formPassword" name="formPassword" value="{{ $user->password }}" readonly>
                    @error('password')
                        <small class="text-danger error_nis">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('farm.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

@endsection
@section('js')
    <script>
        $('#menu-farm').removeClass('collapsed');
    </script>
@endsection
