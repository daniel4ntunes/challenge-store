<?php

namespace App\Http\Business\Checkout;

class TransactionProductCreate
{
    public static function run($transaction, $value)
    {
        $transactionProduct = [
            'transaction_id' => $transaction->id,
            'des' => $value->name,
            'unit_price' => $value->unit_price,
            'quantity' => $value->quantity,
            'product_id' => $value->product_id,
        ];

        TransactionProductValidator::run($transactionProduct);

        return $transactionProduct;
    }
}
