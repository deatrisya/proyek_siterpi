

<table width="100%">
    <tbody>
        <tr>
            <td colspan="6" rowspan="5"  style="text-align: center">
                <p><b>{{ config('app.name') }}</b></p>
                <p class="fs mb-0">{{ config('app.address') }} Tlp. {{ config('app.phone') }}</p>
                <p><b>Laporan Data Riwayat Pakan</b></p>
            </td>
        </tr>
        <br><br>

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
<table >
    <thead>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
        <tr>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">No</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">Nama User</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">Nama Pakan</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">Tanggal</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">Masuk</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">Keluar</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; font-weight: bold;">Keterangan Penggunaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feedhis as $data)
            <tr>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->user->name }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->feed->nama_obat }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{!! date('d F Y',strtotime($data->tanggal)) !!}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->masuk }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->keluar}}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->keterangan}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
