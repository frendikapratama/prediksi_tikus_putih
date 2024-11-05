@extends('layouts.app')

@section('title', 'Edit Kategori Tikus')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kategori Size Tikus</h4>
                <form action="{{ route('kategori.update', $kategoriSize->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama Size Kategori</label>
                        <input type="text" class="form-control text-light" name="name" id="name"
                            placeholder="Input Nama Kategori" value="{{ $kategoriSize->name }}" required>
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
