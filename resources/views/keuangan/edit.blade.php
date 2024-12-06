@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Keuanagan</h4>
                <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="jenis_id" class="form-label">Jenis Tikus</label>
                        <select name="jenis_id" id="jenis_id" class="form-control text-light" required>
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $keuangan->jenis_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori_size_id" class="form-label">Kategori Size</label>
                        <select name="kategori_size_id" id="kategori_size_id" class="form-control text-light" required>
                            <option value="">Pilih Kategori Size</option>
                            @foreach ($kategoriSize as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $keuangan->kategori_size_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="biaya_pakan">Banyak Pakan (kg)</label>
                        <input type="number" name="biaya_pakan" id="biaya_pakan" class="form-control text-light"
                            value="{{ $keuangan->biaya_pakan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="biaya_lainnya" class="form-label">Biaya Lainnya</label>
                        <input type="number" name="biaya_lainnya" id="biaya_lainnya" class="form-control text-light"
                            value="{{ $keuangan->biaya_lainnya }}" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_pertikus" class="form-label">Harga Jual Per Tikus</label>
                        <input type="number" name="harga_pertikus" id="harga_pertikus" class="form-control text-light"
                            value="{{ $keuangan->harga_pertikus }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pendapatan_bulanan" class="form-label">Pendapatan</label>
                        <input type="number" name="pendapatan_bulanan" id="pendapatan_bulanan"
                            class="form-control text-light" value="{{ $keuangan->pendapatan_bulanan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="created_at" class="form-label">Created At (Bulan dan Tahun)</label>
                        <input type="month" name="created_at" id="created_at" class="form-control text-light"
                            value="{{ $keuangan->created_at->format('Y-m') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                    <a href="{{ route('keuangan.index') }}" class="btn btn-dark text-decoration-none">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
