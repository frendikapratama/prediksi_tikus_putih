@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Pakan</h4>
                <form class="forms-sample" action="{{ route('storeReproduksi') }}" method="POST">
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
                        <label for="total_reproduksi">Total Hasil Reproduksi</label>
                        <input type="number" name="total_reproduksi" id="total_reproduksi" class="form-control text-light"
                            placeholder="Inputn Total Hasil Reproduksi" required>
                    </div>

                    <div class="form-group">
                        <label for="total_mati">Total Kematian</label>
                        <input type="number" name="total_mati" id="total_mati" class="form-control text-light"
                            placeholder="Input Total Kematian" required>
                    </div>

                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="month" name="periode" id="periode" class="form-control text-light"
                            placeholder="Input " required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
