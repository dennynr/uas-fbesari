<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Mengambil semua data transaksi dari database
        $transactions = Transaction::all();
        $pageTitle = 'Transaction'; // Tambahkan titik koma pada akhir baris ini
        // Menampilkan view 'transactions.index' dan mengirimkan data transaksi ke dalam view
        return view('transaksi', [
            'pageTitle' => $pageTitle,
            'transactions' => $transactions,
        ]);
    }
    public function exportPdf()
    {
        $transactions = Transaction::all();

        $pdf = PDF::loadView('pdf/exportPdfT', compact('transactions'));

        return $pdf->download('Transactions.pdf');
    }
    public function exportPdfI($id)
    {
        // Get the transaction data from the database based on the transaction ID
        $transaction = Transaction::find($id);

        // Check if the transaction exists
        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaction not found.');
        }

        // Generate the PDF using the invoice template and transaction data
        $pdf = PDF::loadView('pdf/exportPdfI', ['transaction' => $transaction]);

        // Download the PDF with a custom file name
        return $pdf->download('invoice_' . $transaction->transaction_code . '.pdf');
    }

}
