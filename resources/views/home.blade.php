@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <main class="col-md-8 bg-light p-4">
        <h1 class="mb-5">{{ $pageTitle }}</h1>
        <div class="mb-4 d-flex flex-wrap">
            <button class="btn btn-light text-center btn-custom" data-type="all">
                <i class="bi bi-card-list d-block"></i>
                <span>All</span>
            </button>
            <button class="btn btn-light text-center btn-custom" data-type="1">
                <i class="bi bi-egg-fried d-block"></i>
                <span>Makanan</span>
            </button>
            <button class="btn btn-light text-center btn-custom" data-type="2">
                <i class="bi bi-cup-hot d-block"></i>
                <span>Minuman</span>
            </button>
            <button class="btn btn-light text-center btn-custom" data-type="3">
                <i class="bi bi-three-dots"></i>
                <span>Lainnya</span>
            </button>
        </div>


        <!-- Items -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="mb-4">Pilih Item</h3>
            </div>
        </div>
        <div class="row" id="itemContainer">
            @foreach ($items as $item)
                <div class="col-md-4 mb-4 item-card" data-type="{{ $item->type_id }}" data-id="{{ $item->id }}">
                    <div class="card bg-brown d-flex border-0 rounded-4" style="background-color: #ffffff;">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name_item }}"
                            class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">{{ $item->name_item }}</h5>
                                <p>Stock: {{ $item->qty }}</p>
                            </div>
                            <div class="mt-2 mb-2">
                                @if ($item->qty > 0)
                                    <!-- Pass the quantity as an additional data attribute -->
                                    <a href="#" class="btn btn-brown btn-beli text-white mt-3"
                                        data-id="{{ $item->id }}"
                                        data-qty="{{ $item->qty }}">Rp{{ $item->price }}</a>
                                @else
                                    <button class="btn btn-brown btn-beli mt-3" disabled>Habis</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <!-- Right Sidebar -->
    <aside class="col-md-3">
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
        <h5>Bills</h5>
        <div class="selected-items bg-light rounded-4">
            <ul id="selectedItemsList">
                <!-- Items will be added dynamically here -->
            </ul>
        </div>
        <div class="total-and-pay">
            <p class="total-amount mt-3">Total: Rp0</p>
            <form id="paymentForm" action="{{ route('pay') }}" method="POST">
                @csrf
                <input type="hidden" name="selected_items" id="selectedItemsInput" value="">

                <!-- Add a button to trigger showing the quantity inputs -->

                <div id="quantityInputs">
                    <!-- JavaScript will dynamically add quantity input fields here -->
                </div>

                <input type="hidden" name="total_amount" id="totalAmountInput" value="0">
                <button type="submit" class="btn btn-primary btn-pay d-block" id="bayarButton">Bayar</button>

            </form>
        </div>
    </aside>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Tambahkan input tersembunyi untuk menyimpan data yang dikirimkan ke server -->

    <script>
        // Global variables to store selected items and total amount
        let selectedItems = [];
        let totalAmount = 0;

        // Function to update the selected items list in the aside
        function updateSelectedItems() {
            const selectedItemsList = document.getElementById('selectedItemsList');
            selectedItemsList.innerHTML = '';

            selectedItems.forEach((item) => {
                const listItem = document.createElement('li');
                const quantityText = item.quantity > 1 ? `${item.quantity}x` : '';

                // Remove the 'public/' prefix from the image path
                const imagePath = item.image.replace('public/', '');

                listItem.innerHTML = `
            <img src="{{ asset('storage') }}/${imagePath}" alt="${item.name}">
            <span style="font-size: 12px;">
                ${item.name}  Rp${item.price}
            </span>
            <span style="font-size: 12px;margin-left: 10px;">
                ${quantityText}
            </span>
            <button class="btn btn-delete" data-item="${item.name}" style="padding: 0 4px;">
                <i class="fas fa-trash-alt"></i>
            </button>
        `;
                selectedItemsList.appendChild(listItem);
            });

            document.querySelector('.total-amount').textContent = `Total: Rp${totalAmount}`;

            // Ambil element input tersembunyi
            const selectedItemsInput = document.getElementById('selectedItemsInput');
            const totalAmountInput = document.getElementById('totalAmountInput');

            // Convert selectedItems dari array JavaScript menjadi string JSON
            const selectedItemsString = selectedItems.map(item => item.name).join(',');

            // Set the value of the hidden input with the JSON string
            selectedItemsInput.value = selectedItemsString;
            totalAmountInput.value = totalAmount;
        }


        // Function to check if an item already exists in the selected items list
        function isItemExists(item) {
            return selectedItems.some((selectedItem) => selectedItem.name === item.name);
        }

        function updateBayarButtonState() {
            const bayarButton = document.getElementById('bayarButton');

            if (selectedItems.length === 0) {
                bayarButton.disabled = true;
            } else {
                bayarButton.disabled = false;
            }
        }
        updateBayarButtonState();
        // Function to add an item to the selected items list
        // Function to add an item to the selected items list
        function addItemToCart(item) {
            const itemQuantityInput = prompt(`Masukkan jumlah ${item.name} yang akan dibeli:`, '1');
            const quantity = parseInt(itemQuantityInput) || 1; // Ambil nilai qty dari input atau 1 jika tidak ada input

            if (quantity <= 0) {
                // Tampilkan pesan error jika kuantitas tidak valid
                alert('Kuantitas harus lebih dari 0');
                return;
            }

            if (quantity > item.qty) {
                // Tampilkan pesan error jika kuantitas melebihi stok
                alert('Jumlah melebihi stock');
                return;
            }

            // Modifikasi: Tambahkan kuantitas (quantity) ke dalam item sebelum ditambahkan ke selectedItems
            item.quantity = quantity;
            item.id = item.id; // Tambahkan ID item

            if (isItemExists(item)) {
                // If the item already exists, update its quantity instead of adding it again
                const existingItem = selectedItems.find((selectedItem) => selectedItem.name === item.name);
                existingItem.quantity += quantity;
            } else {
                // If the item doesn't exist, add it to the selected items list
                selectedItems.push(item);
            }
            totalAmount += item.price * quantity;
            updateSelectedItems();
            updateBayarButtonState();

            // Find the corresponding quantity input field and update its value
            const quantityInput = document.querySelector(`input[name="quantities[${item.id}]"]`);
            if (quantityInput) {
                quantityInput.value = item.quantity;
            }
        }






        // Function to remove an item from the selected items list
        function removeItemFromCart(itemName) {
            const existingItemIndex = selectedItems.findIndex((selectedItem) => selectedItem.name === itemName);
            if (existingItemIndex !== -1) {
                const existingItem = selectedItems[existingItemIndex];
                existingItem.quantity--;
                totalAmount -= existingItem.price;
                if (existingItem.quantity === 0) {
                    // Remove the item from the list if its quantity becomes zero
                    selectedItems.splice(existingItemIndex, 1);
                }
            }
            updateSelectedItems();
            updateBayarButtonState();
        }

        // Event listener using event delegation for the delete button
        document.getElementById('selectedItemsList').addEventListener('click', (event) => {
            const deleteButton = event.target.closest('.btn-delete');
            if (deleteButton) {
                const itemName = deleteButton.getAttribute('data-item');
                removeItemFromCart(itemName);
            }
        });

        // Sample data for items
        const items = [
            @foreach ($items as $item)
                {
                    id: {{ $item->id }},
                    name: '{{ $item->name_item }}',
                    price: {{ $item->price }},
                    image: '{{ $item->image }}',
                    type_id: '{{ $item->type_id }}' // Tambahkan ID tipe item
                },
            @endforeach
        ];

        // Function to filter items based on the selected category
        function filterItems(type) {
            const itemCards = document.querySelectorAll('.item-card');
            itemCards.forEach((card) => {
                const itemType = card.getAttribute('data-type');
                if (type === 'all' || itemType === type) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Function to add click event listeners to the category buttons
        function addCategoryButtonClickListeners() {
            const categoryButtons = document.querySelectorAll('.btn-custom');
            categoryButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const type = button.getAttribute('data-type');
                    filterItems(type);
                });
            });
        }

        // Call the function to add click event listeners to the category buttons when the page loads
        document.addEventListener('DOMContentLoaded', addCategoryButtonClickListeners);

        // Event listener for the payment form submission
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            // Convert the selected items into a comma-separated string
            const selectedItemsString = selectedItems.map(item => item.name).join(',');

            // Convert the quantities object into a JSON string
            const quantitiesString = JSON.stringify(selectedItems.reduce((obj, item) => {
                obj[item.id] = item.quantity;
                return obj;
            }, {}));

            // Set the value of the hidden inputs with the selected items and quantities data
            document.getElementById('selectedItemsInput').value = selectedItemsString;
            document.getElementById('quantitiesInput').value = quantitiesString;
        });

        // Function to dynamically add quantity input fields for each item
        function addQuantityInputFields() {
            const quantityInputsContainer = document.getElementById('quantityInputs');
            items.forEach((item) => {
                const quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = `quantities[${item.id}]`;
                quantityInput.value = 1; // Set the default value to 1
                quantityInput.min = 1; // Set the minimum value to 1
                quantityInputsContainer.appendChild(quantityInput);
            });
        }

        // Call the function to add quantity input fields when the page loads
        addQuantityInputFields();

        // Add event listeners to the "Beli" buttons to add items to the cart
        const addToCartButtons = document.querySelectorAll('.btn-beli');
        addToCartButtons.forEach((button, index) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                addItemToCart(items[index]);
            });
        });

        // Add event listeners to the "-" buttons to remove items from the cart
        const minusButtons = document.querySelectorAll('.btn-minus');
        minusButtons.forEach((button) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const itemName = button.getAttribute('data-item');
                removeItemFromCart(itemName);
            });
        });

        // Add event listeners to the delete buttons to remove items from the cart
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const itemName = button.getAttribute('data-item');
                removeItemFromCart(itemName);
            });
        });
    </script>


    <script>
        function filterItems(type) {
            const itemElements = document.querySelectorAll('.item-card');
            itemElements.forEach((element) => {
                const itemType = element.getAttribute('data-type');

                if (type === 'all' || itemType === type) {
                    element.style.display = 'block';
                } else {
                    element.style.display = 'none';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Default filter is 'all'
            filterItems('all');

            // Add click event listener to the category buttons
            const categoryButtons = document.querySelectorAll('.btn-custom');
            categoryButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const type = button.getAttribute('data-type');
                    filterItems(type);
                });
            });
        });
    </script>

    <script>
        // Event listener for the payment form submission
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            // Convert the selected items into a comma-separated string
            const selectedItemsString = selectedItems.map(item => item.name).join(',');

            // Convert the quantities object into a JSON string
            const quantitiesString = JSON.stringify(selectedItems.reduce((obj, item) => {
                obj[item.id] = item.quantity;
                return obj;
            }, {}));

            // Set the value of the hidden inputs with the selected items and quantities data
            document.getElementById('selectedItemsInput').value = selectedItemsString;
            document.getElementById('quantitiesInput').value = quantitiesString;
        });
    </script>
    <script>
        // Add an event listener to the "Bayar" button
        document.getElementById('bayarButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission if you are using it inside a form.

            // Show the SweetAlert confirmation
            Swal.fire({
                title: 'Konfirmasi Transaksi',
                text: 'Apakah Anda yakin ingin melakukan transaksi?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Bayar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If the user clicks "Ya, Bayar," proceed with the form submission
                if (result.isConfirmed) {
                    document.getElementById('paymentForm')
                        .submit(); // Replace 'yourFormId' with the actual form ID if needed.
                }
            });
        });
    </script>
@endsection
