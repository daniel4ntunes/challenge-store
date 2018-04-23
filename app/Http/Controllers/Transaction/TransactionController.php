<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Transaction as TransactionModel;
use App\Http\Business\Cart\Cart as CartBusiness;

class TransactionController extends Controller
{
    public function __construct()
    {
        // this->middleware('auth');
    }

    public function indexAction()
    {
        $transactions = TransactionModel::all();

        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        return view('Transaction.index')->with('transactions', $transactions);
    }

    public function detailAction($id)
    {
        $transaction = TransactionModel::find($id);

        return view('Transaction.details')->with([
            'transaction' => $transaction,
        ]);
    }
}
