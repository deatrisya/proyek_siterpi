@extends('layouts.app')
@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/vendor/select2/select2.min.css')}}">
@endsection
@section('content')

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            {{-- Card Tanggal --}}
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-4 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">{{ config('app.name') }}</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="d-flex flex-column h-100 ps-3">
                                            <p class="fw-bold">{{ $today }}, {{ $date }}</p>
                                            <p class="mb-5 ">Jl. Dusun Kutukan Timur RT.03 RW.05 , Desa Lecari, Kec.
                                                Sukorejo, Kab. Pasuruan, Jawa Timur 67161</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ms-auto text-center mt-lg-0">
                                        <div class="position-relative d-flex align-items-center justify-content-center">
                                            <img class="w-50 position-relative z-index-2"
                                                src="{{ asset('admin/img/logo perusahaan.png') }}" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Cow Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Sapi Terjual</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$cowsold}}</h6>
                                        <span class="text-success small pt-1 fw-bold">0%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Cow Sales Card -->

                    <!-- Cow Not Sold Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Sapi Belum Terjual</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$cownotsold}}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- Cow Not Sold Card -->

                    <!-- Medicine Stok Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Stok Pakan</h5>
                                <div class="select mb-3">
                                    <label for="">Filter berdasarkan stok</label>
                                <select class="js-example-basic-single w-100" name="feed_id" id="feed_id">
                                    <option value="">Pilih Nama Pakan</option>
                                    @foreach ($feed as $data)
                                    <option value="{{ $data->id }}"
                                        @if (old('feed_id') == $data->id) selected @endif>{{ $data->nama_pakan }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="d-flex align-items-center"> 
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        {{-- <h6 id="stok_akhir"></h6> --}}
                                        <input type="number" class="form-control" id="stok_akhir" name="stok_akhir" value="0">

                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                  <!-- End Medicine Stok Card -->
                    <!-- Feed Stok Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Stok Obat</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Feed Stok Card -->



                <!-- End Left side columns -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="{{asset('admin/vendor/select2/select2.min.js')}}"></script>
    <script>
        $('#menu-dashboard').removeClass('collapsed');
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
        });
        $('select#feed_id').on('change', function(e) {
            var selected_feed = $(this).children("option:selected").val();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:'/getFeed/'+selected_feed,
                success:function(response){
                    console.log(response);
                    $('#stok_akhir').val(response.stok_akhir)
                }
            })
        })
    </script>
@endsection
