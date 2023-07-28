<?php

namespace App\Http\Controllers;

use App\Models\Sold;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index()
    {
        $pageTitle = 'Profit';
        // Query to calculate total profit from all transactions
        $totalProfit = Transaction::sum('prices');

        // Query to calculate total modal from all items sold
        $totalModal = Sold::sum('purchase_price');

        // Calculate profit percentage if total revenue is not zero
        $totalRevenue = $totalProfit + $totalModal;
        $profitPercentage = $totalRevenue != 0 ? ($totalProfit / $totalRevenue) * 100 : 0;

        // Query to calculate total pengeluaran from all items sold
        $totalExpense = Sold::sum('purchase_price');

        // Calculate pengeluaran percentage if total revenue is not zero
        $expensePercentage = $totalRevenue != 0 ? ($totalExpense / $totalRevenue) * 100 : 0;

        // Calculate Keuntungan Kotor (Gross Profit)
        $grossProfit = $totalProfit - $totalModal;

        // Calculate Keuntungan Bersih (Net Profit)
        $netProfit = $grossProfit - $totalExpense;

        return view('profit', [
            'pageTitle' => $pageTitle,
            'totalProfit' => $totalProfit,
            'totalModal' => $totalModal,
            'expensePercentage' => $expensePercentage,
            'totalExpense' => $totalExpense,
            'profitPercentage' => $profitPercentage,
            'grossProfit' => $grossProfit,
            'netProfit' => $netProfit,
        ]);
    }
}
