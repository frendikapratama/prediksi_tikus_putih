@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Tikus</h4>
                <form action="{{ route('tikus.update', $tikus->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="jenis_id" class="form-label">Jenis</label>
                        <select name="jenis_id" id="jenis_id" class="form-control text-light" required>
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $tikus->jenis_id ? 'selected' : '' }}>
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
                                    {{ $item->id == $tikus->kategori_size_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="total_jantan" class="form-label">Total Jantan</label>
                        <input type="number" name="total_jantan" id="total_jantan" class="form-control text-light"
                            value="{{ $tikus->total_jantan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="total_betina" class="form-label">Total Betina</label>
                        <input type="number" name="total_betina" id="total_betina" class="form-control text-light"
                            value="{{ $tikus->total_betina }}" required>
                    </div>

                    <div class="form-group">
                        <label for="created_at" class="form-label">Created At (Bulan dan Tahun)</label>
                        <input type="month" name="created_at" id="created_at" class="form-control text-light"
                            value="{{ $tikus->created_at->format('Y-m') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                    <a href="{{ route('tikus.index') }}" class="btn btn-dark text-decoration-none">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
