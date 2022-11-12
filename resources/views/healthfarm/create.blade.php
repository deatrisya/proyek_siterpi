@extends('layouts.app')
@section('title', 'Riwayat Kesehatan Sapi')
@section('content')
    <div class="pagetitle">
        <h1>Tambah Riwayat Kesehatan Sapi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Master Sapi</a></li>
                <li class="breadcrumb-item active">Riwayat Kesehatan Sapi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Riwayat Kesehatan</h5>
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="{{ route('healthfarm.store') }}">
                @csrf
                <div class="col-4">
                    <label for="inputAddress" class="form-label">Nomor Sapi</label>
                    <select class="form-select" aria-label="Default select example" name="farm_id" id="farm_id" required>
                        <option value="">-- Pilih Nomor Sapi --</option>
                        @foreach ($farm as $data)
                            <option value="{{ $data->id }}" @if (old('farm_id') == $data->id) selected @endif>
                                {{ $data->nis }}
                            </option>
                        @endforeach
                    </select>
                    @error('farm_id')
                        <small class="text-danger farm_id">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <small class="text-danger tanggal">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <label for="inputAddress" class="form-label">Keterangan Penyakit</label>
                    <br>
                    <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="5" >{{old('keterangan')}} </textarea>
                    @error('keterangan')
                    <small class="text-danger keterangan">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('healthfarm.index'') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form><!-- End Multi Columns Form -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        // $('#feed-nav').removeClass('collapsed');
        // $('.sidebar-feed').addClass('show');
        // $('#menu-detail-feed').addClass('active');
        $('#menu-health-farm').removeClass('collapsed');
    </script>
@endsection
