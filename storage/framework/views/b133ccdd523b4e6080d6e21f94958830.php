<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <main class="col-md-11 bg-light p-4" style="width:91%">
            <!-- Card Kasir -->
            <div class="card kasir-card">
                <div class="card-body">
                    <span class="card-title">Hi Im Cashier</span><br>
                    <span class="card-subtitle">Denny Daffa Rizaldy</span>
                </div>
            </div>
            <!-- Tabel Item -->
            <div class="mt-4 text-end me-3">
                <button class="btn btn-add" id="addItemBtn" data-bs-toggle="modal" data-bs-target="#addItemModal">
                    <i class="bi bi-plus"></i> Add Item
            </div>
            <h3 class="title-item mb-3">Items</h3>
            <div class="table-responsive p-4 rounded-4" style="width:100%">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Harga</th>
                            <th>Jenis</th>
                            <th>Stock</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Makanan 1</td>
                            <td>Rp10.000</td>
                            <td>Makanan</td>
                            <td>10</td>
                            <td>
                                <a href="#" class="edit-item" data-toggle="modal" data-target="#editModal"
                                    data-item-id="item1"><i class="bi bi-pencil"></i></a> | <a href="#"
                                    class="add-stock" data-toggle="modal" data-target="#addStockModal"
                                    data-item-id="item1"><i class="bi bi-plus"></i></a>
                                | <a href="#" class="delete-transaction" data-transaction-id="transaction2"><i
                                        class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Makanan 2</td>
                            <td>Rp12.000</td>
                            <td>Makanan</td>
                            <td>15</td>
                            <td><a href=""><i class="bi bi-pencil"></i></a> | <a href="#"><i
                                        class="bi bi-plus"></i></a>
                                | <a href="#" class="delete-transaction" data-transaction-id="transaction2"><i
                                        class="bi bi-trash3"></i></a></td>
                        </tr>
                        <!-- Tambahkan baris lain untuk item lainnya -->
                    </tbody>
                </table>
            </div>
            <!-- Modal Add Item -->
            <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Add Item -->
                            <form id="addItemForm">
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Item Name</label>
                                    <input type="text" class="form-control" id="itemName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="itemPrice" class="form-label">Item Price (Rp)</label>
                                    <input type="number" class="form-control" id="itemPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="itemStock" class="form-label">Item Stock</label>
                                    <input type="number" class="form-control" id="itemStock" min="1"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="itemType" class="form-label">Jenis</label>
                                    <select class="form-select form-control" id="itemType" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="Makanan">Makanan</option>
                                        <option value="Minuman">Minuman</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success" id="saveItemBtn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your form fields here for editing the item -->
                            <form id="editItemForm">
                                <div class="mb-3">
                                    <label for="editItemName" class="form-label">Item Name</label>
                                    <input type="text" class="form-control" id="editItemName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editItemPrice" class="form-label">Item Price (Rp)</label>
                                    <input type="number" class="form-control" id="editItemPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editItemStock" class="form-label">Item Stock</label>
                                    <input type="number" class="form-control" id="editItemStock" required>
                                </div>
                                <!-- Add more fields for editing other item details -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveEditButton">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Stock Modal -->
            <div class="modal fade" id="addStockModal" tabindex="-1" role="dialog"
                aria-labelledby="addStockModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStockModalLabel">Add Stock</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your form fields here for adding stock -->
                            <form id="addStockForm">
                                <div class="mb-3">
                                    <label for="addStockAmount" class="form-label">Stock Amount</label>
                                    <input type="number" class="form-control" id="addStockAmount" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveAddStockButton">Save
                                Changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#example');
</script>
<script>
    document.getElementById("saveItemBtn").addEventListener("click", function() {
        // Ambil data dari form
        var itemName = document.getElementById("itemName").value;
        var itemPrice = document.getElementById("itemPrice").value;
        var itemStock = document.getElementById("itemStock").value;

        // Buat baris baru dalam tabel dengan data yang diisi
        var table = document.getElementById("example").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);
        newRow.innerHTML = "<td>" + itemName + "</td><td>Rp" + itemPrice + "</td><td>" + itemStock +
            "</td><td><a href='#'><i class='bi bi-pencil'></i></a> | <a href='#'><i class='bi bi-trash3'></i></a></td>";

        // Tutup modal setelah menambahkan item
        var modal = new bootstrap.Modal(document.getElementById('addItemModal'));
        modal.hide();
    });
</script>
<script>
    // "Plus" button click event
    const addStockButtons = document.querySelectorAll('.add-stock');

    addStockButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const itemId = button.dataset.itemId;
            // Your code to fetch the item information for the given itemId
            // For example: const itemInfo = fetchItemInfo(itemId);

            // Show the add stock modal
            const addStockModal = new bootstrap.Modal(document.getElementById('addStockModal'));
            addStockModal.show();
        });
    });
</script>

<script>
    // Add event listener to delete-transaction links
    const deleteTransactionLinks = document.querySelectorAll('.delete-transaction');

    deleteTransactionLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Get the transaction ID from the data-transaction-id attribute
            const transactionId = link.getAttribute('data-transaction-id');

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this transaction!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, you can proceed with the deletion logic here
                    // For example, you can use the transactionId to delete the transaction from the database
                    // Once the deletion is successful, you may want to remove the row from the table
                    document.getElementById(transactionId).remove();

                    // Show success message
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'The transaction has been deleted.',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    });
                }
            });
        });
    });
</script>
<script>
    // Edit button click event
    const editButtons = document.querySelectorAll('.edit-item');

    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const itemId = button.dataset.itemId;
            // Your code to fetch the item information for the given itemId
            // For example: const itemInfo = fetchItemInfo(itemId);

            // Set the item information in the edit modal form
            // document.getElementById('editItemName').value = itemInfo.name;
            // document.getElementById('editItemPrice').value = itemInfo.price;
            // document.getElementById('editItemStock').value = itemInfo.stock;

            // Show the edit modal
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        });
    });
</script>
<?php /**PATH D:\Project UAS\uas\resources\views/item.blade.php ENDPATH**/ ?>