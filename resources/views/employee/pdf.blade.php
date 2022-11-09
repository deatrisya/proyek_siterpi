<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laporan Data Pegawai</title>
    <link href="{{asset('admin/img/logo perusahaan.png')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}

    <style>
        @page {
            margin: 24px;
        }

        .fs {
            font-size: 12px !important;
        }

        .table-bordered tr th,
        .table-bordered tr td {
            padding: 2px 3px !important;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tbody>
            {{-- <tr>
                <td style="border-bottom:2px; text-align: center;padding: 2px; width: 100px; width:100px">
                    <img src="{{public_path('admin/img/logo perusahaan.png')}}" alt="" style="width: 100px; height: 100px;">
                </td>
                <td colspan="3" class="text-center">
                    <h3 class="mb-1 text-center">{{ config('app.name') }}</h3>
                    <p class="fs mb-0">{{ config('app.address') }}</p>
                    <p class="fs mb-0">No. Tlp. {{ config('app.phone') }}</p>
                </td>
            </tr>
            <tr>
                <h5 class="mb-8 mt-6 text-center">Laporan Data Pegawai</h5>
            </tr> --}}
            <table align="center" style="border-collapse:collapse;">
                <td style="border-bottom:2px solid #000; text-align: center; width: 70px; width:70px">
                    <img src="{{public_path('admin/img/logo perusahaan.png')}}" alt="" style="width: 100px; height: 100px;">
                </td>
                <br>
                <td colspan="3" style="border-bottom:2px solid #000; text-align: center; width: 150px; width:650px">
                    <h3 class="mb-1 text-center">{{ config('app.name') }}</h3>
                    <p class="fs mb-0">{{ config('app.address') }}</p>
                    <p class="fs mb-0">No. Tlp. {{ config('app.phone') }}</p>
                </td>
            </table>
        <br>
            <h6 style="text-align: center;" > LAPORAN DATA PEGAWAI</h6>
            <p class="fs" style="text-indent :5em;"> <b>Tanggal </b> :
                @php
                    echo date(' d F Y');
                @endphp </p>
            <p class="fs" style="text-indent :5em;"> <b>Waktu </b>   :
            @php
                date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
                echo date('h:i:s a'); // menampilkan jam sekarang
            @endphp </p>

            {{-- <tr>
                <td class="fs" width="10%">
                    Bahan
                </td>
                <td class="fs">: {{ $item->name ?? '' }}</td>
                <td></td>
            </tr>
            <tr>
                <td class="fs" width="10%">
                    Gudang
                </td>
                <td class="fs">: {{ $warehouse->name ?? '' }}</td>
                <td></td>
            </tr> --}}
        </tbody>
    </table>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center fs">No</th>
                <th class="text-center fs">NIP</th>
                <th class="text-center fs">Nama</th>
                <th class="text-center fs">Jenis Kelamin</th>
                <th class="text-center fs">Tempat Lahir</th>
                <th class="text-center fs">Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $data)
                <tr>
                    <td class="fs text-center">{{ $loop->iteration }}</td>
                    <td class="fs text-center">{{ $data->nip }}</td>
                    <td class="fs text-center">{{ $data->nama }}</td>
                    <td class="fs text-center">{{ $data->getJenisKelamin()}}</td>
                    <td class="fs text-center">{{ $data->tempat_lahir }}</td>
                    <td class="fs text-center">{{date('d F Y', strtotime($data->tgl_lahir))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
