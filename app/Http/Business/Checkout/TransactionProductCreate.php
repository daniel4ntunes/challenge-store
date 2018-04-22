<?php

namespace App\Http\Business\Checkout;

use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($transactionProduct, [
            'transaction_id' => 'required',
            'des' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Exception('Campos Obrigatórios', 400);
        }

        return $transactionProduct;
    }
}
