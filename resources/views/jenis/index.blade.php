<!-- resources/views/jenis/index.blade.php -->
@extends('layouts.app')

@section('title', 'Kelola Jenis Tikus')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Jenis Tikus</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('jenis.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Tambah Jenis Tikus
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="mdi mdi-border-color"></i></a>
                                        <form action="{{ route('jenis.destroy', $item->id) }}" method="POST"
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
