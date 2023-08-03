@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <main class="col-md-11 bg-light p-4" style="width:91.5%">
        <!-- Card Kasir -->
        <div class="card kasir-card">
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
        <h1 class="mb-4">Transaksi</h1>
        <a href="{{ route('pdf/exportPdfT') }}" class="btn btn-outline-danger">
            <i class="bi bi-download me-1"></i> to PDF
        </a>
        <div class="table-responsive p-4 rounded-4 mt-3 ">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Invoice</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $post)
                        <tr>
                            <td>{{ $post->transaction_code }}</td>
                            <td>Rp{{ $post->prices }}</td>
                            <td>{{ $post->date }}</td>
                            <td>{{ $post->method }}</td>
                            <td>
                                <a href="{{ route('pdf/exportPdfI', ['id' => $post->id]) }}" class="btn btn-outline-danger">
                                    <i class="bi bi-download me-1"></i> to PDF
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Add more rows for other transactions -->
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
