@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rata-Rata Cuaca Bulanan</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($monthlyAverages->isEmpty())
            <div class="alert alert-warning">
                Tidak ada data rata-rata cuaca bulanan.
                <a href="{{ route('recalculate.monthly.averages') }}" class="btn btn-primary">Hitung Sekarang</a>
            </div>
        @else
            <div class="mb-3">
                <a href="{{ route('recalculate.monthly.averages') }}" class="btn btn-warning">Perbarui Perhitungan</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kota</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Suhu Rata-Rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlyAverages as $average)
                        <tr>
                            <td>{{ $average->city }}</td>
                            <td>{{ $average->year }}</td>
                            <td>{{ $average->formatted_month }}</td>
                            <td>{{ $average->average_temperature }}°C</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <!-- Pagination Controls -->
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Weather Data Pagination">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($monthlyAverages->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $monthlyAverages->previousPageUrl() }}" aria-label="Previous">
                                Previous
                            </a>
                        </li>
                    @endif

                    <!-- Always show Page 1 -->
                    @if ($monthlyAverages->currentPage() > 3)
                        <li class="page-item">
                            <a class="page-link" href="{{ $monthlyAverages->url(1) }}">1</a>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif

                    <!-- Page Number Range (show a limited set of page numbers) -->
                    @php
                        $currentPage = $monthlyAverages->currentPage();
                        $lastPage = $monthlyAverages->lastPage();
                        $range = 2; // Number of pages to show before and after the current page
                    @endphp

                    @for ($i = max(2, $currentPage - $range); $i <= min($lastPage - 1, $currentPage + $range); $i++)
                        <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $monthlyAverages->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Always show the Last Page -->
                    @if ($monthlyAverages->currentPage() < $lastPage - 2)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $monthlyAverages->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                    @endif

                    <!-- Next Page Link -->
                    @if ($monthlyAverages->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $monthlyAverages->nextPageUrl() }}" aria-label="Next">
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
@endsection
