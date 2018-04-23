<?php

namespace App\Http\Business\Checkout;

use Validator;

class TransactionValidator
{
    public static function run($data)
    {
        $validator = Validator::make($data, [
            'date_added' => 'required',
            'customer_id' => 'required',
            'total' => 'required',
        ]);

        $auth = true;
        if ($validator->fails()) {
            $auth = false;
        }

        return $auth;
    }
}
