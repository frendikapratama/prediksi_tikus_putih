@extends('layouts.app')

@section('title', 'Edit Data Tikus')

@section('content')
    <h1>Edit Data Tikus</h1>
    <a href="{{ route('tikus.index') }}" class="btn btn-secondary mb-3">Back to Data Tikus</a>

    <form action="{{ route('tikus.update', $tikus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="jenis_id" class="form-label">Jenis</label>
            <select name="jenis_id" id="jenis_id" class="form-select" required>
                <option value="">Select Jenis</option>
                @foreach ($jenis as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $tikus->jenis_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kategori_size_id" class="form-label">Kategori Size</label>
            <select name="kategori_size_id" id="kategori_size_id" class="form-select" required>
                <option value="">Select Kategori Size</option>
                @foreach ($kategoriSize as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $tikus->kategori_size_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="banyak" class="form-label">Banyak</label>
            <input type="number" name="banyak" id="banyak" class="form-control" value="{{ $tikus->banyak }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
@endsection
