@extends('layouts.app')

@section('title', 'Tambah Kategori Tikus')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Kategori Size Tikus</h4>
                <form class="forms-sample" action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Size Kategori</label>
                        <input type="text" class="form-control text-light" name="name" id="name"
                            placeholder="Input Nama Kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">
                        <a href="{{ route('kategori.index') }}" style="text-decoration: none;">
                            Cancel
                        </a>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
