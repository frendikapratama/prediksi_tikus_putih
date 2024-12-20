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
                                    <td>{{ $pakan->periode }} </td>
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
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Weather Data Pagination">
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            @if ($pakans->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pakans->previousPageUrl() }}" aria-label="Previous">
                                        Previous
                                    </a>
                                </li>
                            @endif

                            <!-- Always show Page 1 -->
                            @if ($pakans->currentPage() > 3)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pakans->url(1) }}">1</a>
                                </li>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                            <!-- Page Number Range (show a limited set of page numbers) -->
                            @php
                                $currentPage = $pakans->currentPage();
                                $lastPage = $pakans->lastPage();
                                $range = 2; // Number of pages to show before and after the current page
                            @endphp

                            @for ($i = max(2, $currentPage - $range); $i <= min($lastPage - 1, $currentPage + $range); $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $pakans->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Always show the Last Page -->
                            @if ($pakans->currentPage() < $lastPage - 2)
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pakans->url($lastPage) }}">{{ $lastPage }}</a>
                                </li>
                            @endif

                            <!-- Next Page Link -->
                            @if ($pakans->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pakans->nextPageUrl() }}" aria-label="Next">
                                        Next
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
