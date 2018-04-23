<?php

namespace App\Http\Business\Checkout;

use Validator;

class TransactionProductValidator
{
    public static function run($data)
    {
        $validator = Validator::make($data, [
            'transaction_id' => 'required',
            'des' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'product_id' => 'required',
        ]);

        $auth = true;
        if ($validator->fails()) {
            $auth = false;
        }

        return $auth;
    }
}
