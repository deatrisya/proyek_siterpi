

<table width="100%">
    <tbody>
        <tr>
            <td colspan="3" class="text-center">
                <h4 class="mb-1 text-center">{{ config('app.name') }}</h4>
                <p class="fs mb-0">{{ config('app.address') }}</p>
                <p class="fs mb-0">No. Tlp. {{ config('app.phone') }}</p>
                <h5 class="mb-4 mt-2 text-center">Laporan Data Sapi</h5>
            </td>
        </tr>

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
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; background:#7FFFD4">No</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; background:#7FFFD4">Nama User</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; background:#7FFFD4">Nama Obat</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; background:#7FFFD4">Tanggal</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; background:#7FFFD4">Masuk</th>
            <th class="text-center fs" style="border: 1px solid black; text-align: center;vertical-align:middle ;height: 40px; background:#7FFFD4">Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($drughis as $data)
            <tr>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->user->name }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->drug->nama_obat }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{!! date('d F Y',strtotime($data->tanggal)) !!}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->masuk }}</td>
                <td class="fs text-center" style="border: 1px solid black; text-align: center;">{{ $data->keluar}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
