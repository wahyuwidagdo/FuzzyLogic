@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="text-center">MASUKKAN DATA</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="" method="POST">
            <div class="form-group">
                <label for="fasilitas">Fasilitas Kurang Nyaman</label>
                <input type="text" name="fasilitas" value="{{ old('fasilitas') }}" class="form-control">
                <div>{{ $errors->first('fasilitas') }}</div>
            </div>

            <div class="form-group">
                <label for="fasilitas">Fasilitas Cukup Nyaman</label>
                <input type="text" name="fasilitas" value="{{ old('fasilitas') }}" class="form-control">
                <div>{{ $errors->first('fasilitas') }}</div>
            </div>

            <div class="form-group">
                <label for="fasilitas">Fasilitas Sangat Nyaman</label>
                <input type="text" name="fasilitas" value="{{ old('fasilitas') }}" class="form-control">
                <div>{{ $errors->first('fasilitas') }}</div>
            </div>

            <div class="form-group">
                <label for="pelayanan">Pelayanan Kurang Baik</label>
                <input type="text" name="pelayanan" value="{{ old('pelayanan') }}" class="form-control">
                <div>{{ $errors->first('pelayanan') }}</div>
            </div>

            <div class="form-group">
                <label for="pelayanan">Pelayanan Cukup Baik</label>
                <input type="text" name="pelayanan" value="{{ old('pelayanan') }}" class="form-control">
                <div>{{ $errors->first('pelayanan') }}</div>
            </div>

            <div class="form-group">
                <label for="pelayanan">Pelayanan Sangat Baik</label>
                <input type="text" name="pelayanan" value="{{ old('pelayanan') }}" class="form-control">
                <div>{{ $errors->first('pelayanan') }}</div>
            </div>

            <button type="submit" class="btn btn-primary">Analisa Data</button>
        </form>
    </div>
</div>
@endsection