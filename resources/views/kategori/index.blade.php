<!-- resources/views/kategori/index.blade.php -->
@extends('layouts.app')

@section('title', 'Kategori Size')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kategori Size Tikus</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('kategori.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add Kategori
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriSizes as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="mdi mdi-border-color"></i></a>
                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-delete-variant"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
