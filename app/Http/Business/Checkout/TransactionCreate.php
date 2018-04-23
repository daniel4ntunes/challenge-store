<?php

namespace App\Http\Business\Checkout;

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

        TransactionValidator::run($transaction);

        return $transaction;
    }
}
