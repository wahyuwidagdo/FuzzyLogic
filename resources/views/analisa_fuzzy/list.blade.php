@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Fasilitas Kurang Nyaman</th>
                    <th>Fasilitas Cukup Nyaman</th>
                    <th>Fasilitas Sangat Nyaman</th>
                    <th>Pelayanan Kurang Baik</th>
                    <th>Pelayanan Cukup Baik</th>
                    <th>Pelayanan Sangat Baik</th>
                    <th>Hasil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_fuzzies as $data_fuzzy)
                <tr>
                    <td>{{ $data_fuzzy->id }}</td>
                    <td>{{ $data_fuzzy->fasilitas_kn }}</td>
                    <td>{{ $data_fuzzy->fasilitas_cn }}</td>
                    <td>{{ $data_fuzzy->fasilitas_sn }}</td>
                    <td>{{ $data_fuzzy->pelayanan_kb }}</td>
                    <td>{{ $data_fuzzy->pelayanan_cb }}</td>
                    <td>{{ $data_fuzzy->pelayanan_sb }}</td>
                    <td>{{ $data_fuzzy->defuzzyfikasi->z_hasil }}</td>
                    <td>Hapus</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection