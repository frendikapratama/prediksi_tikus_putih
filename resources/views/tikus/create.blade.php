@extends('layouts.app')

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
                        <label for="total_jantan">Total Jantan</label>
                        <input type="number" class="form-control text-light" name="total_jantan" id="total_jantan"
                            placeholder="Input Total" value="0">
                    </div>
                    <div class="form-group">
                        <label for="total_betina">Total Betina</label>
                        <input type="number" class="form-control text-light" name="total_betina" id="total_betina"
                            placeholder="Input Total"value="0">
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
