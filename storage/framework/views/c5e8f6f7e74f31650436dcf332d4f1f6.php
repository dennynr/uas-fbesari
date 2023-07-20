<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-1">
            <div class="position-sticky">
                <!-- Sidebar Logo -->
                <div class="text-center my-4 mb-5">
                    <img src="logo.png" id="sidebar-logo" alt="Logo" width="100" class="rounded">
                </div>
                <!-- Sidebar Items -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-egg-fried"></i>
                            <span>Menu</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('item')); ?>">
                            <i class="bi bi-box"></i>
                            <span>Item</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('profit')); ?>">
                            <i class="bi bi-cash-coin"></i>
                            <span>Profit</span>
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <a class="nav-link" href="<?php echo e(route('transaksi')); ?>">
                            <i class="bi bi-clock-history"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a class="nav-link" href="#">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="col-md-11 bg-light p-4">
            <div class="card kasir-card mb-4">
                <div class="card-body">
                    <span class="card-title">Hi Im Cashier</span><br>
                    <span class="card-subtitle">Denny Daffa Rizaldy</span>
                </div>
            </div>
            <!-- Static dan Pilih Tanggal di sebelah kanan -->
            <div class="card border-0 p-4 rounded-4">
                <h3 class="mb-0">Static</h3>
                <div class="mb-3 d-flex justify-content-end align-items-center">
                    <div>
                        <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-light border-2 border-primary p-3 mb-4">
                            <h5 class="mb-3">Pemasukkan</h5>
                            <span>40%</span>
                            <span>Rp 350.000</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light border-2 border-danger p-3 mb-4">
                            <h5 class="mb-3">Pengeluaran</h5>
                            <span>40%</span>
                            <span>Rp 350.000</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light border-2 border-success p-3 mb-4">
                            <h5 class="mb-3">Keuntungan</h5>
                            <span>40%</span>
                            <span>Rp 350.000</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Graph -->
            <div class="card border-0 rounded-4 p-3 mb-4 mt-4">
                <h5 class="mt-3 mb-3">Grafik Keuntungan</h5>
                <canvas id="myChart" width="300" height="150"></canvas>
            </div>
        </main>
    </body>
<?php /**PATH D:\Project UAS\uas\resources\views/profit.blade.php ENDPATH**/ ?>