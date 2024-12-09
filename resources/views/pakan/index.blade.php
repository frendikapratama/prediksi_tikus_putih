@extends('layouts.app')
{{-- @if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif --}}
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pakan</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('pakan.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Tambah Data Pakan
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Kategori Size</th>
                                <th>Banyak Pakan per Tikus (g)</th>
                                <th>Jumlah Pemberian Pakan Harian</th>
                                <th>Periode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pakans as $pakan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pakan->jenis->name }}</td>
                                    <td>{{ $pakan->kategoriSize->name }}</td>
                                    <td>{{ $pakan->banyak_pakan_per_tikus }} g</td>
                                    <td>{{ $pakan->jumlah_pemberian_pakan }} X/hari</td>
                                    <td> {{ $pakan->created_at ? $pakan->created_at->format('F Y') : 'No Date' }}</td>
                                    <td>
                                        <a href="{{ route('pakan.edit', $pakan->id) }}" class="btn btn-warning btn-sm"><i
                                                class="mdi mdi-border-color"></i></a>
                                        <form action="{{ route('pakan.destroy', $pakan->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"> <i
                                                    class="mdi mdi-delete-variant"></i> </button>
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
