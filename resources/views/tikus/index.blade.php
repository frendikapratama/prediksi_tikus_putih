@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Tikus</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('tikus.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Tambah Data Tikus
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Jenis </th>
                                <th> Kateogori size </th>
                                <th> Jumlah Jantan </th>
                                <th> Jumlah Betina </th>
                                <th> Total Tikus </th>
                                <th> Periode </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTikus as $key => $item)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td> {{ $item->jenis->name }} </td>
                                    <td>
                                        {{ $item->kategoriSize->name }}
                                    </td>
                                    <td> {{ $item->total_jantan }} </td>
                                    <td> {{ $item->total_betina }} </td>
                                    <td> {{ $item->total_jantan + $item->total_betina }} </td>
                                    <td> {{ $item->periode }}</td>
                                    <td> <a href="{{ route('tikus.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="mdi mdi-border-color"></i></a>
                                        <form action="{{ route('tikus.destroy', $item->id) }}" method="POST"
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
                            @if ($dataTikus->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataTikus->previousPageUrl() }}" aria-label="Previous">
                                        Previous
                                    </a>
                                </li>
                            @endif

                            <!-- Always show Page 1 -->
                            @if ($dataTikus->currentPage() > 3)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataTikus->url(1) }}">1</a>
                                </li>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            @endif

                            <!-- Page Number Range (show a limited set of page numbers) -->
                            @php
                                $currentPage = $dataTikus->currentPage();
                                $lastPage = $dataTikus->lastPage();
                                $range = 2; // Number of pages to show before and after the current page
                            @endphp

                            @for ($i = max(2, $currentPage - $range); $i <= min($lastPage - 1, $currentPage + $range); $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $dataTikus->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Always show the Last Page -->
                            @if ($dataTikus->currentPage() < $lastPage - 2)
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataTikus->url($lastPage) }}">{{ $lastPage }}</a>
                                </li>
                            @endif

                            <!-- Next Page Link -->
                            @if ($dataTikus->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataTikus->nextPageUrl() }}" aria-label="Next">
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
