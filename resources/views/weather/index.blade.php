@extends('layouts.app')

@section('content')
    <div id="weatherData">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Cuaca</h4>
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
