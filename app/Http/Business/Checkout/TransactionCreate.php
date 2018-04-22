<?php

namespace App\Http\Business\Checkout;

use Illuminate\Support\Facades\Validator;
use App\Http\Business\Cart\Cart as CartBusiness;

class TransactionCreate
{
    public static function run($data)
    {
        $transaction = [
            'date_added' => new \DateTime(),
            'customer_id' => $data->id,
            'total' => CartBusiness::getTotalCart(),
        ];

        $validator = Validator::make($transaction, [
            'date_added' => 'required',
            'customer_id' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Exception('Campos Obrigatórios', 400);
        }

        return $transaction;
    }
}
