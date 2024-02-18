<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\BalanceTransaction;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * display the transaction resources
     */
    public function index()
    {
        $transactions = BalanceTransaction::query()->latest()->with('user')->get();
        return view('agents.transaction.index', compact('transactions'));
    }
}
