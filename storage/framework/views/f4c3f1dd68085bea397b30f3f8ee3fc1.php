<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="col-md-11 bg-light p-4" style="width:91.5%">
        <!-- Card Kasir -->
        <div class="card kasir-card">
            <div class="card-body">
                <span class="card-title">Hi Im Cashier</span><br>
                <span class="card-subtitle">
                    <?php if(session('username')): ?>
                        <?php echo e(session('username')); ?>

                    <?php else: ?>
                        Guest User
                        <!-- Or any default value you want to show when no username is stored in the session -->
                    <?php endif; ?>
                </span>
            </div>
        </div>
        <h1 class="mb-4">Transaksi</h1>
        <a href="<?php echo e(route('pdf/exportPdfT')); ?>" class="btn btn-outline-danger">
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
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->transaction_code); ?></td>
                            <td>Rp<?php echo e($post->prices); ?></td>
                            <td><?php echo e($post->date); ?></td>
                            <td><?php echo e($post->method); ?></td>
                            <td>
                                <a href="<?php echo e(route('pdf/exportPdfI', ['id' => $post->id])); ?>" class="btn btn-outline-danger">
                                    <i class="bi bi-download me-1"></i> to PDF
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project UAS\uas\resources\views/transaksi.blade.php ENDPATH**/ ?>