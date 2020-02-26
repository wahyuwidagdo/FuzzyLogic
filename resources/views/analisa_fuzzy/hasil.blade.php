@extends('layouts.app')

@section('content')
<h2>Data Input dan Fuzzyfikasi</h2>
<div class="row">
    <div class="col-6">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Himpunan</th>
                    <th>Nilai Input</th>
                    <th>uFuzzy</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kurang Nyaman</td>
                    <td>{{ $data_fuzzy->fasilitas_kn }}</td>
                    <td>{{ $fuzzyfikasi->kurang_nyaman }}</td>
                </tr>
                <tr>
                    <td>Cukup Nyaman</td>
                    <td>{{ $data_fuzzy->fasilitas_cn }}</td>
                    <td>{{ $fuzzyfikasi->cukup_nyaman }}</td>
                </tr>
                <tr>
                    <td>Sangat Nyaman</td>
                    <td>{{ $data_fuzzy->fasilitas_sn }}</td>
                    <td>{{ $fuzzyfikasi->sangat_nyaman }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2>Inferensi dan Defuzzyfikasi</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Mesin Inferensi</th>
                    <th>z(n)</th>
                    <th>Z</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $inferensi->a_predikat1 }}</td>
                    <td>{{ $defuzzyfikasi->z1 }}</td>
                    <td rowspan="9" style="vertical-align:middle; text-align:center;">{{ $defuzzyfikasi->z_hasil }}</td>
                    <td rowspan="9" style="vertical-align:middle; text-align:center;">{{ $defuzzyfikasi->keterangan }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>{{ $inferensi->a_predikat2 }}</td>
                    <td>{{ $defuzzyfikasi->z2 }}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>{{ $inferensi->a_predikat3 }}</td>
                    <td>{{ $defuzzyfikasi->z3 }}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>{{ $inferensi->a_predikat4 }}</td>
                    <td>{{ $defuzzyfikasi->z4 }}</td>
                
                </tr>
                <tr>
                    <td>5</td>
                    <td>{{ $inferensi->a_predikat5 }}</td>
                    <td>{{ $defuzzyfikasi->z5 }}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>{{ $inferensi->a_predikat6 }}</td>
                    <td>{{ $defuzzyfikasi->z6 }}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>{{ $inferensi->a_predikat7 }}</td>
                    <td>{{ $defuzzyfikasi->z7 }}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>{{ $inferensi->a_predikat8 }}</td>
                    <td>{{ $defuzzyfikasi->z8 }}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>{{ $inferensi->a_predikat9 }}</td>
                    <td>{{ $defuzzyfikasi->z9 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection