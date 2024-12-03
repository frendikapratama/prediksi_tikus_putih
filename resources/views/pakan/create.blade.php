@extends('layouts.app')

@section('title', 'Tambah Data Pakan')

@section('content')
    <h1>Tambah Data Pakan</h1>

    <form action="{{ route('pakan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="jenis_id">Jenis Tikus</label>
            <select name="jenis_id" id="jenis_id" class="form-control" required>
                <option value="">Pilih Jenis</option>
                @foreach ($jenis as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_size_id">Kategori Size</label>
            <select name="kategori_size_id" id="kategori_size_id" class="form-control" required>
                <option value="">Pilih Kategori Size</option>
                @foreach ($kategoriSize as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="banyak_pakan_per_tikus">Banyak Pakan per Tikus (kg)</label>
            <input type="number" name="banyak_pakan_per_tikus" id="banyak_pakan_per_tikus" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jumlah_pemberian_pakan">Jumlah Pemberian Pakan Harian</label>
            <input type="number" name="jumlah_pemberian_pakan" id="jumlah_pemberian_pakan" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
