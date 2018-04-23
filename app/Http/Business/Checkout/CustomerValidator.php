<?php

namespace App\Http\Business\Checkout;

use Validator;

class CustomerValidator
{
    public static function run($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cpf' => 'required',
            'phone' => 'required',
        ]);

        $auth = true;
        if ($validator->fails()) {
            $auth = false;
        }

        return $auth;
    }
}
