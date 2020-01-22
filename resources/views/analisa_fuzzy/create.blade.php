@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="text-center">MASUKKAN DATA</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="/analisa/{{ $data_fuzzy->id }}" method="POST">
            <div class="form-group">
                <label for="fasilitas_kn">Fasilitas Kurang Nyaman</label>
                <input type="text" name="fasilitas_kn" value="{{ old('fasilitas') }}" class="form-control">
                <div>{{ $errors->first('fasilitas') }}</div>
            </div>

            <div class="form-group">
                <label for="fasilitas_cn">Fasilitas Cukup Nyaman</label>
                <input type="text" name="fasilitas_cn" value="{{ old('fasilitas') }}" class="form-control">
                <div>{{ $errors->first('fasilitas') }}</div>
            </div>

            <div class="form-group">
                <label for="fasilitas_sn">Fasilitas Sangat Nyaman</label>
                <input type="text" name="fasilitas_sn" value="{{ old('fasilitas') }}" class="form-control">
                <div>{{ $errors->first('fasilitas') }}</div>
            </div>

            <div class="form-group">
                <label for="pelayanan_kb">Pelayanan Kurang Baik</label>
                <input type="text" name="pelayanan_kb" value="{{ old('pelayanan') }}" class="form-control">
                <div>{{ $errors->first('pelayanan') }}</div>
            </div>

            <div class="form-group">
                <label for="pelayanan_cb">Pelayanan Cukup Baik</label>
                <input type="text" name="pelayanan_cb" value="{{ old('pelayanan') }}" class="form-control">
                <div>{{ $errors->first('pelayanan') }}</div>
            </div>

            <div class="form-group">
                <label for="pelayanan_sb">Pelayanan Sangat Baik</label>
                <input type="text" name="pelayanan_sb" value="{{ old('pelayanan') }}" class="form-control">
                <div>{{ $errors->first('pelayanan') }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Input Data</button>
            @csrf
        </form>
    </div>
</div>
@endsection