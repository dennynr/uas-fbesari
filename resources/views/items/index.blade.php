@extends('layouts.app')
@section('content')
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
                <i class="bi bi-plus"></i> Add Item </button>
        </div>
        <h3 class="title-item mb-3">Items</h3>
        <div class="table-responsive p-4 rounded-4" style="width:100%;">
            <table id="example" class="table table-striped" style="width:100% ">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Items</th>
                        <th>Harga</th>
                        <th>Jenis</th>
                        <th>Stock</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $post)
                        <tr>
                            <td>{{ $post->code_item }}</td>
                            <td>{{ $post->name_item }}</td>
                            <td>Rp {{ $post->price }}</td>
                            <td>{{ $post->type->type }}</td>
                            <td>{{ $post->qty }}</td>
                            <td>
                                @include('items.actions')
                            </td>
                        </tr>
                    @endforeach
                    <!-- Tambahkan baris lain untuk item lainnya -->
                </tbody>
            </table>
        </div>
        <!-- Modal Add Item -->
        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">{{ $CreateItem }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Add Item -->
                        <form action="{{ route('items.store') }}" id="addItemForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="itemName" class="form-label">Item Name</label>
                                <input type="text" class="form-control" name="itemName" id="itemName"
                                    value="{{ old('itemName') }}" placeholder="Nama barang, Contoh: Indomie" required>
                            </div>
                            <div class="mb-3">
                                <label for="itemWholesalePrice" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control" name="itemBuy" id="itemWholesalePrice"
                                    placeholder="Harga barang asli barang ketika kulak"
                                    value="{{ old('itemWholesalePrice') }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="itemPrice" class="form-label">Item Price (Rp)</label>
                                    <input type="number" class="form-control" name="itemPrice" id="itemPrice"
                                        value="{{ old('itemPrice') }}" placeholder="Harga yang akan dijual" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="itemStock" class="form-label">Item Stock</label>
                                    <input type="number" class="form-control" name="itemStock" id="itemStock"
                                        value="{{ old('itemStock') }}" min="1"
                                        placeholder="Isi dari box/renteng contoh: 12" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="itemType" class="form-label">Jenis</label>
                                <select class="form-select form-control" name="itemType" id="itemType" required>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('itemType') == $type->id ? 'selected' : '' }}>
                                            {{ $type->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="itemImage" class="form-label">Item Image</label>
                                <input type="file" class="form-control" name="itemImage" id="itemImage" accept="image/*"
                                    required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" id="saveItemBtn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        @foreach ($items as $item)
            <div class="modal fade" id="editModal_{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="editItemForm_{{ $item->id }}"
                            action="{{ route('items.update', ['item' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <!-- Form untuk mengedit item -->
                                <div class="mb-3">
                                    <label for="editItemName_{{ $item->id }}" class="form-label">Nama
                                        Item</label>
                                    <input type="text" class="form-control" id="editItemName_{{ $item->id }}"
                                        value="{{ $item->name_item }}" name="itemName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editItemPrice_{{ $item->id }}" class="form-label">Harga Item
                                        (Rp)
                                    </label>
                                    <input type="number" class="form-control" value="{{ $item->price }}"
                                        id="editItemPrice_{{ $item->id }}" name="itemPrice" min="0" required>
                                </div>
                                <!-- Tambahkan kolom lain yang ingin diubah -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Add Stock Modal -->
        @foreach ($items as $item)
            <!-- ... code sebelumnya ... -->
            <!-- Modal for adding stock -->
            <div class="modal fade" id="addStockModal_{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="addStockModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStockModalLabel">Add Stock</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('items.addStock', ['item' => $item->id]) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <!-- Add your form fields here for adding stock -->
                                <div class="mb-3">
                                    <label for="addStockAmount" class="form-label">Stock Amount</label>
                                    <input type="number" class="form-control" id="addStockAmount_{{ $item->id }}"
                                        name="stockAmount" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </main>
    @include('sweetalert::alert')
    <script>
        // Pastikan ini dijalankan setelah sumber daya Bootstrap dimuat
        $(document).ready(function() {
            var myModal = new bootstrap.Modal(document.getElementById('addItemModal'));
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#example');
        // resources/js/app.js atau file JavaScript terpisah yang Anda gunakan

        // Fungsi untuk menampilkan SweetAlert konfirmasi delete
    </script>
    <script>
        // Add event listener to delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const name = this.getAttribute('data-name');
                const form = document.getElementById('deleteForm' + this.getAttribute('data-id'));

                Swal.fire({
                    title: "Are you sure want to delete " + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form when the user confirms the deletion
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
