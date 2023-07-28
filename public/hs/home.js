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
    @foreach($items as $item)
        {
        id: {{ $item-> id }},
name: '{{ $item->name_item }}',
    price: { { $item -> price } },
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
document.getElementById('paymentForm').addEventListener('submit', function (event) {
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
const items = [
    @foreach($items as $item)
        {
        type: '{{ $item->type_id }}',
    },
    @endforeach
];
// SCRIPT PEMBEDA
function filterItems(type) {
    const typeMap = {
        all: null,
        makanan: 1,
        minuman: 2,
        lainnya: 3
    };

    const typeId = typeMap[type];

    const itemElements = document.querySelectorAll('.item-card');
    itemElements.forEach((element) => {
        const itemType = element.getAttribute('data-type');
        const itemTypeId = typeMap[itemType];

        if (typeId === null || itemTypeId === typeId) {
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
document.getElementById('paymentForm').addEventListener('submit', function (event) {
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
