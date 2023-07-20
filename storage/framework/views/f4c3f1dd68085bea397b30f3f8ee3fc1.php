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
        <main class="col-md-11 bg-light p-4" style="width:91.5%">
            <!-- Card Kasir -->
            <div class="card kasir-card">
                <div class="card-body">
                    <span class="card-title">Hi Im Cashier</span><br>
                    <span class="card-subtitle">Denny Daffa Rizaldy</span>
                </div>
            </div>
            <h1 class="mb-4">Transaksi</h1>
            <div class="table-responsive p-4 rounded-4">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Date</th>
                            <th>Cashier</th>
                            <th>Method</th>
                            <th>Invoice</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>W092731</td>
                            <td>2023-07-18</td>
                            <td>Denny Daffa Rizaldy</td>
                            <th>Offline</th>
                            <td><a href="">Download</a></td>
                        </tr>
                        <tr>
                            <td>W092731</td>
                            <td>2023-07-19</td>
                            <td>John Doe</td>
                            <th>Online</th>
                            <td><a href="">Download</a></td>
                        </tr>
                        <!-- Add more rows for other transactions -->
                    </tbody>
                </table>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script>new DataTable('#example');</script>
<?php /**PATH D:\Project UAS\uas\resources\views/transaksi.blade.php ENDPATH**/ ?>