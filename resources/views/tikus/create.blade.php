@extends('layouts.app')

@section('title', 'Add Data Tikus')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Tikus</h4>
                <form class="forms-sample" action="{{ route('tikus.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_id">Jenis</label>
                        <select class="form-control text-light" id="jenis_id" name="jenis_id" required>
                            <option value="">Select Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori_size_id">Kategori Size</label>
                        <select class="form-control text-light" id="kategori_size_id" name="kategori_size_id" required>
                            <option value="">Select Jenis</option>
                            @foreach ($kategoriSize as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="banyak">Total</label>
                        <input type="number" class="form-control text-light" name="banyak" id="banyak"
                            placeholder="Input Total" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
