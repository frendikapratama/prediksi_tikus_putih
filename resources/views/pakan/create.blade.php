@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Pakan</h4>
                <form class="forms-sample" action="{{ route('pakan.store') }}" method="POST">
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
                        <label for="banyak_pakan_per_tikus">Banyak Pakan per Tikus (g)</label>
                        <input type="number" name="banyak_pakan_per_tikus" id="banyak_pakan_per_tikus"
                            class="form-control text-light" placeholder="Inputn Banyak Pakan per Tikus (g)" step="0.01"
                            min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pemberian_pakan">Jumlah Pemberian Pakan Harian</label>
                        <input type="number" name="jumlah_pemberian_pakan" id="jumlah_pemberian_pakan"
                            class="form-control text-light" placeholder="Input Jumlah Pemberian Pakan Harian" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
