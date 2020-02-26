@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Data berhasil diinputkan</h1>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Fasilitas Kurang Nyaman</th>
                    <th>Fasilitas Cukup Nyaman</th>
                    <th>Fasilitas Sangat Nyaman</th>
                    <th>Pelayanan Kurang Baik</th>
                    <th>Pelayanan Cukup Baik</th>
                    <th>Pelayanan Sangat Baik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data_fuzzy->fasilitas_kn }}</td>
                    <td>{{ $data_fuzzy->fasilitas_cn }}</td>
                    <td>{{ $data_fuzzy->fasilitas_sn }}</td>
                    <td>{{ $data_fuzzy->pelayanan_kb }}</td>
                    <td>{{ $data_fuzzy->pelayanan_cb }}</td>
                    <td>{{ $data_fuzzy->pelayanan_sb }}</td>
                </tr>
            </tbody>
        </table>

        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Analisa</a> -->
        <form action="/analisa/{{ $data_fuzzy->id }}/hasil" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">Analisa Data Fuzzy</button>
        </form>    
    </div>
</div>
@endsection