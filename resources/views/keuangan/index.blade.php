@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data keuangan</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('keuangan.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Tambah Kategori
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Kategori Size</th>
                                <th>Biaya Pakan (kg)</th>
                                <th>Biaya Lainnya</th>
                                <th>Harga Jual Per Tikus</th>
                                <th>Pendapatan</th>
                                <th>Periode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Keuangan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> {{ $item->jenis->name }} </td>
                                    <td>
                                        {{ $item->kategoriSize->name }}
                                    </td>
                                    <td>{{ $item->biaya_pakan }}</td>
                                    <td>{{ $item->biaya_lainnya }}</td>
                                    <td>{{ $item->harga_pertikus }}</td>
                                    <td>{{ $item->pendapatan_bulanan }}</td>
                                    <td> {{ $item->created_at ? $item->created_at->format('F Y') : 'No Date' }}</td>
                                    <td>
                                        <a href="{{ route('keuangan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="mdi mdi-border-color"></i></a>
                                        <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda Yakin ?')" style="display:inline;">
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
