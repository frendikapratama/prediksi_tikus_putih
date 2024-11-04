@extends('layouts.app')

@section('title', 'Edit Data Tikus')

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
                            <option value="">Select Jenis</option>
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
                            <option value="">Select Kategori Size</option>
                            @foreach ($kategoriSize as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $tikus->kategori_size_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banyak" class="form-label">Banyak</label>
                        <input type="number" name="banyak" id="banyak" class="form-control text-light"
                            value="{{ $tikus->banyak }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                    <button class="btn btn-dark">
                        <a href="{{ route('tikus.index') }}" style="text-decoration: none;">
                            Cancel
                        </a>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
