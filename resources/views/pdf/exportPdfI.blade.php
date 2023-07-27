<!-- invoice.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <link rel="stylesheet" href="styles.css">
</head>
<!-- ... Rest of the CSS and HTML ... -->
<style>
    body {
        font-family: 'Helvetica Neue', sans-serif;
        background-color: #F9E0BB;
        margin: 0;
        padding: 0;
    }

    .invoice {
        max-width: 600px;
        margin: 30px auto;
        background-color: #FFFFFF;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 20px;
    }

    header {
        color: #FFFFFF;
        text-align: center;
        padding: 20px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        position: relative;
    }

    .logo {
        width: 80px;
        height: 80px;
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .header-text {
        margin-top: 15px;
    }

    h1 {
        font-size: 28px;
        margin: 0;
    }

    .transaction-details {
        margin-top: 15px;
        font-size: 14px;
    }

    .invoice-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
    }

    .invoice-item:last-child {
        border-bottom: none;
    }

    .item-name {
        flex: 1;
    }

    .item-price,
    .item-total {
        font-weight: bold;
    }

    .total-amount {
        margin-right: 10px;
        text-align: right;
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
        padding-top: 10px;
        border-top: 2px solid #FFFFFF;
        background-color: #C38154;
        color: #fff;
    }
</style>
<body>
    <div class="invoice">
        <header style="background-color: #884A39;">
            <div class="header-text">
                <h1>F'Besari Cafe</h1>
                <p>Mojokerto</p>
            </div>
            <div class="transaction-details">
                <p>Transaction Date: {{ $transaction->date }}</p>
                <p>Transaction ID: {{ $transaction->transaction_code }}</p>
            </div>
        </header>
        <main>
            <!-- Display the transaction items -->
            <div class="invoice-item">
                <span class="item-name">{{ $transaction->items }}</span>
                <span class="item-method">{{ $transaction->method }}</span>
                <span class="item-price">Rp{{ $transaction->prices }}</span>
                {{-- <span class="item-total">Rp{{ $item->price * $item->quantity }}</span> --}}
            </div>
            <!-- End of transaction items -->

            <div class="total-amount" style="background-color: #C38154; color: #fff;">
                Total: Rp{{ $transaction->prices }}
            </div>
        </main>
    </div>
</body>


</html>
