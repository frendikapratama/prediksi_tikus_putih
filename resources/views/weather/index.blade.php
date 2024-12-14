@extends('layouts.app')

@section('content')
    <div id="weatherData">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Cuaca Harian</h4>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-icon-text" id="fetchWeatherButton"
                            onclick="window.location.href='{{ route('fetch-weather') }}'" {{ $canFetch ? '' : 'disabled' }}>
                            <i class="mdi mdi-file-check btn-icon-prepend"></i>
                            <span id="buttonText">
                                {{ $canFetch ? 'Ambil Data Cuaca 6 Hari' : 'Tunggu...' }}
                            </span>
                        </button>
                        @if (!$canFetch)
                            <span id="countdown" class="ml-2 text-danger"></span>
                        @endif
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>City</th>
                                    <th>Temperature (°C)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="weatherTableBody">
                                @foreach ($weatherData as $weather)
                                    <tr>
                                        <td>{{ $weather->city }}</td>
                                        <td>{{ $weather->temperature }}</td>
                                        <td>{{ $weather->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Controls -->
                    <div class="d-flex justify-content-center mt-4">
                        <nav aria-label="Weather Data Pagination">
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($weatherData->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $weatherData->previousPageUrl() }}"
                                            aria-label="Previous">
                                            Previous
                                        </a>
                                    </li>
                                @endif

                                <!-- Always show Page 1 -->
                                @if ($weatherData->currentPage() > 3)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $weatherData->url(1) }}">1</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif

                                <!-- Page Number Range (show a limited set of page numbers) -->
                                @php
                                    $currentPage = $weatherData->currentPage();
                                    $lastPage = $weatherData->lastPage();
                                    $range = 2; // Number of pages to show before and after the current page
                                @endphp

                                @for ($i = max(2, $currentPage - $range); $i <= min($lastPage - 1, $currentPage + $range); $i++)
                                    <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $weatherData->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Always show the Last Page -->
                                @if ($weatherData->currentPage() < $lastPage - 2)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $weatherData->url($lastPage) }}">{{ $lastPage }}</a>
                                    </li>
                                @endif

                                <!-- Next Page Link -->
                                @if ($weatherData->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $weatherData->nextPageUrl() }}" aria-label="Next">
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
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timeRemaining = {{ $timeRemaining ?? 0 }};
            const countdownElement = document.getElementById('countdown');
            const buttonText = document.getElementById('buttonText');

            if (timeRemaining > 0) {
                let interval = setInterval(() => {
                    const days = Math.floor(timeRemaining / (24 * 60 * 60));
                    const hours = Math.floor((timeRemaining % (24 * 60 * 60)) / (60 * 60));
                    const minutes = Math.floor((timeRemaining % (60 * 60)) / 60);
                    const seconds = timeRemaining % 60;

                    if (countdownElement) {
                        countdownElement.textContent =
                            `Tersedia dalam: ${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
                    }

                    if (timeRemaining <= 0) {
                        clearInterval(interval);
                        window.location.reload();
                    }

                    timeRemaining -= 1;
                }, 1000);
            }
        });
    </script>
@endsection
