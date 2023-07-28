<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Type;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = 'Menu';
        $items = Item::with('type')->get();
        $types = Type::all(); // Fetch all the types from the database

        return view('home', [
            'pageTitle' => $pageTitle,
            'items' => $items,
            'types' => $types, // Pass the types to the view
        ]);
    }

    public function pay(Request $request)
    {
        $items = $request->selected_items ?? [];
        if (!is_array($items)) {
            $items = [$items];
        }

        // Inisialisasi array untuk menyimpan data barang yang dipilih
        $selectedItems = [];

        // Inisialisasi total quantity yang akan dibeli
        $totalQuantity = 0;

        // Loop melalui setiap nama barang yang terdapat di $items
        foreach ($items as $itemName) {
            // Pisahkan string itemName berdasarkan tanda koma (,)
            $itemNames = explode(',', $itemName);

            // Loop melalui setiap item yang dipisahkan
            foreach ($itemNames as $singleItemName) {
                // Hapus spasi ekstra dari awal dan akhir setiap string
                $singleItemName = trim($singleItemName);

                // Cari data barang berdasarkan nama item
                $item = Item::where('name_item', $singleItemName)->first();

                // Jika data barang ditemukan, tambahkan ke dalam array selectedItems
                if ($item) {
                    // Ambil data kuantitas (quantity) dari form pembayaran
                    $quantities = $request->input('quantities');

                    // Pastikan kuantitas (quantity) valid dan lebih dari 0
                    if (isset($quantities[$item->id]) && is_numeric($quantities[$item->id]) && $quantities[$item->id] > 0) {
                        // Tambahkan kuantitas (quantity) yang diinputkan ke total quantity
                        $totalQuantity += (int) $quantities[$item->id];

                        // Tambahkan data barang ke dalam array selectedItems
                        $selectedItems[] = $item;
                    } else {
                        // Tampilkan pesan error jika kuantitas tidak valid
                        return back()->withErrors(['Kuantitas harus lebih dari 0']);
                    }
                }
            }
        }

        // Simpan perubahan jumlah barang ke dalam database
        $selectedItemsList = [];

        // Loop through each item and quantity from the form
        foreach ($selectedItems as $item) {
            $quantities = $request->input('quantities');
            $quantity = (int) $quantities[$item->id];

            // Add the item name and quantity to the selectedItemsList array
            $selectedItemsList[] = $item->name_item . ' ' . $quantity . 'x';
        }

        // Combine all selected items and quantities as a single string
        $itemsData = implode(',', $selectedItemsList);

        // Simpan perubahan jumlah barang ke dalam database
        foreach ($selectedItems as $item) {
            $quantities = $request->input('quantities');
            $item->qty -= (int) $quantities[$item->id];
            $item->save();
        }
        // Lakukan proses penyimpanan ke dalam database (misalnya menggunakan model Transaction)
        // Contoh menggunakan model Transaction (pastikan sudah diimport)
        Transaction::create([
            'transaction_code' => 'TRX-' . time(),
            'items' => $itemsData,
            // Save the combined string to the 'items' column in the database
            'prices' => $request->total_amount,
            'method' => 'Cash',
            'date' => now(),
        ]);
        return redirect()->route('home'); // Redirect pengguna kembali ke halaman beranda atau halaman lain yang sesuai setelah berhasil melakukan pembayaran dan perubahan jumlah barang.
    }


}
