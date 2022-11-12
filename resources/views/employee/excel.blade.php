<table width="100%">
    <tbody>
        <tr>
            <td colspan="3" class="text-center">
                <h4 class="mb-1 text-center">{{ config('app.name') }}</h4>
                <p class="fs mb-0">{{ config('app.address') }}</p>
                <p class="fs mb-0">No. Tlp. {{ config('app.phone') }}</p>
                <h5 class="mb-4 mt-2 text-center">Laporan Data Karyawan</h5>
            </td>
        </tr>
    </tbody>
</table>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center fs" style="border: 1px solid black">No</th>
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
                <td class="fs text-center">{{ $data->tgl_lahir}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
