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
        <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                        <a class="nav-link" href="{{ route('item') }}">
                            <i class="bi bi-box"></i>
                            <span>Item</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profit') }}">
                            <i class="bi bi-cash-coin"></i>
                            <span>Profit</span>
                        </a>
                    </li>
                    <li class="nav-item mb-5">
                        <a class="nav-link" href="{{ route('transaksi') }}">
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
        <main class="col-md-8 bg-light p-4">
            <h1 class="mb-5">Pilih Kategori</h1>
            <div class="mb-4 d-flex flex-wrap">
                <button class="btn btn-light text-center btn-custom">
                    <i class="bi bi-card-list d-block"></i>
                    <span>All</span>
                </button>
                <button class="btn btn-light text-center btn-custom">
                    <i class="bi bi-egg-fried d-block"></i>
                    <span>Makanan</span>
                </button>
                <button class="btn btn-light text-center btn-custom">
                    <i class="bi bi-cup-hot d-block"></i>
                    <span>Minuman</span>
                </button>
                <button class="btn btn-light text-center btn-custom">
                    <i class="bi bi-three-dots"></i>
                    <span>Lainnya</span>
                </button>

            </div>
            <!-- Items -->
            <div class="row mt-5">
                <div class="col-md-6">
                    <h3 class="mb-4">Pilih Item</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <input type="text" id="searchInput" class="form-control border-0" placeholder="Cari item...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="minum.png" alt="Barang 1" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">Jeric</h5>
                                <p class="card-text">Deskripsi Barang 1.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp5.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="minum.png" alt="Barang 1" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">OrangeJusic</h5>
                                <p class="card-text">Deskripsi Barang 1.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp5.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="ombe.png" alt="Barang 2" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">Firle Jucie</h5>
                                <p class="card-text">Deskripsi Barang 2.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp25.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="ombe.png" alt="Barang 2" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">Firle Jucie</h5>
                                <p class="card-text">Deskripsi Barang 2.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp25.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="ombe.png" alt="Barang 2" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">Firle Jucie</h5>
                                <p class="card-text">Deskripsi Barang 2.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp25.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="ombe.png" alt="Barang 2" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">Firle Jucie</h5>
                                <p class="card-text">Deskripsi Barang 2.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp25.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-brown d-flex border-0 rounded-4">
                        <img src="ombe.png" alt="Barang 2" class="card-img-center img-fluid mb-4">
                        <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="card-title">Firle Jucie</h5>
                                <p class="card-text">Deskripsi Barang 2.</p>
                            </div>
                            <div class="mt-2 mb-2">
                                <a href="#" class="btn btn-brown btn-beli text-white mt-3">Rp25.000</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more cards for other products -->
            </div>
        </main>
        <!-- Right Sidebar -->
        <aside class="col-md-3">
            <div class="card kasir-card">
                <div class="card-body">
                    <span class="card-title">Hi Im Cashier</span> <br>
                    <span class="card-subtitle">Denny Daffa Rizaldy</span>
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
                <button class="btn btn-primary btn-pay d-block">Bayar</button>
            </div>
        </aside>
    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
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
            listItem.innerHTML = `
                        <img src="${item.image}" alt="${item.name}">
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
    }

    // Function to check if an item already exists in the selected items list
    function isItemExists(item) {
        return selectedItems.some((selectedItem) => selectedItem.name === item.name);
    }

    // Function to add an item to the selected items list
    function addItemToCart(item) {
        if (isItemExists(item)) {
            // If the item already exists, update its quantity instead of adding it again
            const existingItem = selectedItems.find((selectedItem) => selectedItem.name === item.name);
            existingItem.quantity++;
        } else {
            // If the item doesn't exist, add it to the selected items list
            selectedItems.push({ ...item, quantity: 1 });
        }
        totalAmount += item.price;
        updateSelectedItems();
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
        { name: 'OrangeJusic', price: 5000, image: 'minum.png' },
        { name: 'Strovberi Firle', price: 15000, image: 'ombe.png' },
        { name: 'Test', price: 25000, image: 'ombe.png' },
        { name: 'Test1', price: 25000, image: 'ombe.png' },
        { name: 'Test2', price: 25000, image: 'ombe.png' },
        { name: 'Test3', price: 25000, image: 'ombe.png' },
        { name: 'Test4', price: 25000, image: 'ombe.png' },
        { name: 'Test5', price: 25000, image: 'ombe.png' },
        // Add more items here if needed
    ];

    // Add event listeners to the "Beli" buttons to add items to the cart
    const addToCartButtons = document.querySelectorAll('.btn-beli');
    addToCartButtons.forEach((button, index) => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // <-- Tambahkan ini
            addItemToCart(items[index]);
        });
    });

    // Add event listeners to the "-" buttons to remove items from the cart
    const minusButtons = document.querySelectorAll('.btn-minus');
    minusButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // <-- Tambahkan ini
            const itemName = button.getAttribute('data-item');
            removeItemFromCart(itemName);
        });
    });

    // Add event listeners to the delete buttons to remove items from the cart
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // <-- Tambahkan ini
            const itemName = button.getAttribute('data-item');
            removeItemFromCart(itemName);
        });
    });
</script>
