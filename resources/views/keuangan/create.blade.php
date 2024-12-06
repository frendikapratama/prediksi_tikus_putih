@extends('layouts.app')

@section('title', 'Tambah Data Keuanagan')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Keuanagan</h4>
                <form class="forms-sample" action="{{ route('keuangan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_id">Jenis Tikus</label>
                        <select name="jenis_id" id="jenis_id" class="form-control text-light"" required>
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori_size_id">Kategori Size</label>
                        <select name="kategori_size_id" id="kategori_size_id" class="form-control text-light"" required>
                            <option value="">Pilih Kategori Size</option>
                            @foreach ($kategoriSize as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="biaya_pakan">Biaya Pakan (kg)</label>
                        <input type="number" name="biaya_pakan" id="biaya_pakan" class="form-control text-light"
                            placeholder="Input Biaya Pakan (kg)" required>
                    </div>
                    <div class="form-group">
                        <label for="biaya_lainnya">Biaya Lainnya</label>
                        <input type="number" name="biaya_lainnya" id="biaya_lainnya" class="form-control text-light"
                            placeholder="Input biaya lainnya" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_pertikus">Harga Jual Per Tikus</label>
                        <input type="number" name="harga_pertikus" id="harga_pertikus" class="form-control text-light"
                            placeholder="Input biaya lainnya" required>
                    </div>
                    <div class="form-group">
                        <label for="pendapatan_bulanan">Pendapatan Per Bulan</label>
                        <input type="number" name="pendapatan_bulanan" id="pendapatan_bulanan"
                            class="form-control text-light" placeholder="Input biaya lainnya" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
