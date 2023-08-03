@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <main class="col-md-11 bg-light p-4">
        <div class="card kasir-card mb-4">
            <div class="card-body">
                <span class="card-title">Hi Im Cashier</span><br>
                <span class="card-subtitle">
                    @if (session('username'))
                        {{ session('username') }}
                    @else
                        Guest User
                        <!-- Or any default value you want to show when no username is stored in the session -->
                    @endif
                </span>
            </div>
        </div>
        <h3 class="mb-4">{{ $pageTitle }}</h3>
        <!-- Static dan Pilih Tanggal di sebelah kanan -->
        <div class="card border-0 p-4 rounded-4">
            <!-- Form untuk filtering berdasarkan tanggal -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-primary text-light p-3 mb-4">
                        <h5 class="mb-3">Pemasukkan</h5>
                        <span>{{ $profitPercentage }}%</span>
                        <span>Rp {{ $totalProfit }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-light p-3 mb-4">
                        <h5 class="mb-3">Pengeluaran</h5>
                        <span>{{ $expensePercentage }}%</span>
                        <span>Rp {{ $totalExpense }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-light p-3 mb-4">
                        <h5 class="mb-3 ">Keuntungan Kotor</h5>
                        <h2>Rp {{ $totalProfit }}</h2>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-success text-light p-3 mb-4">
                        <h5 class="mb-3 ">Keuntungan Bersih</h5>
                        <h2>Rp {{ $grossProfit }}</h2>
                    </div>
                </div>
            </div>

            <!-- Card Graph -->
            <div class="card border-0 rounded-4 p-3 mb-4 mt-4"style="background-color: #ffffff;">
                <h5 class="mt-3 mb-3">Grafik Keuntungan</h5>
                <canvas id="profitChart" width="400" height="200"></canvas>
            </div>
    </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data yang akan ditampilkan pada grafik
        var data = {
            labels: ['Keuntungan Kotor', 'Keuntungan Bersih', 'Pengeluaran/Modal'],
            datasets: [{
                label: 'Keuntungan',
                data: [
                    {{ $totalProfit }},
                    {{ $grossProfit }},
                    {{ $totalModal }}
                ],
                backgroundColor: [
                    'rgba(139, 69, 19, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(89, 49, 0, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };



        // Opsi konfigurasi grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Inisialisasi grafik
        var ctx = document.getElementById('profitChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
@endsection
