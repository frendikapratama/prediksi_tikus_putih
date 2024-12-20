@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Pakan</h4>
                <form action="{{ route('pakan.update', $pakan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="jenis_id" class="form-label">Jenis Tikus</label>
                        <select name="jenis_id" id="jenis_id" class="form-control text-light" required>
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $pakan->jenis_id ? 'selected' : '' }}>
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
                                    {{ $item->id == $pakan->kategori_size_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banyak_pakan_per_tikus">Banyak Pakan per Tikus (g)</label>
                        <input type="number" name="banyak_pakan_per_tikus" id="banyak_pakan_per_tikus"
                            class="form-control text-light" value="{{ $pakan->banyak_pakan_per_tikus }}" step="0.01"
                            min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pemberian_pakan" class="form-label">Total Betina</label>
                        <input type="number" name="jumlah_pemberian_pakan" id="jumlah_pemberian_pakan"
                            class="form-control text-light" value="{{ $pakan->jumlah_pemberian_pakan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="periode" class="form-label">Periode(Bulan dan Tahun)</label>
                        <input type="month" name="periode" id="periode" class="form-control text-light"
                            value="{{ $pakan->periode }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                    <a href="{{ route('pakan.index') }}" class="btn btn-dark text-decoration-none">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
