<?php

namespace App\Http\Business\Checkout;

use Validator;

class TransactionAddressValidator
{
    public static function run($data)
    {
        $validator = Validator::make($data, [
            'transaction_id' => 'required',
            'zipcode' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighbourhood' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        $auth = true;
        if ($validator->fails()) {
            $auth = false;
        }

        return $auth;
    }
}
