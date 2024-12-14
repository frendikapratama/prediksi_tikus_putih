@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Reproduksi</h4>
                <form method="POST" action="{{ route('reproduksiUpdate', $reproduksi->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="jenis_id" class="form-label">Jenis Tikus</label>
                        <select name="jenis_id" id="jenis_id" class="form-control text-light" required>
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $reproduksi->jenis_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="total_reproduksi"> <label for="total_reproduksi">Total Hasil Reproduksi</label>
                        </label>
                        <input type="number" name="total_reproduksi" id="total_reproduksi" class="form-control text-light"
                            value="{{ $reproduksi->total_reproduksi }}" required>
                    </div>

                    <div class="form-group">
                        <label for="total_mati" class="form-label">Total Kematian</label>
                        <input type="number" name="total_mati" id="total_mati" class="form-control text-light"
                            value="{{ $reproduksi->total_mati }}" required>
                    </div>

                    <div class="form-group">
                        <label for="periode" class="form-label">Periode</label>
                        <input type="month" name="periode" id="periode" class="form-control text-light"
                            value="{{ $reproduksi->periode }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                    <a href="{{ route('reproduksi') }}" class="btn btn-dark text-decoration-none">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
