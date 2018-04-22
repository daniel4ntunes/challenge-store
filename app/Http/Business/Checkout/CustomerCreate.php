<?php

namespace App\Http\Business\Checkout;

use Illuminate\Support\Facades\Validator;

class CustomerCreate
{
    public static function run($data)
    {
        $customer = [
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'phone' => $data['phone'],
        ];

        $validator = Validator::make($customer, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cpf' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Exception('Campos Obrigatórios', 400);
        }

        return $customer;
    }
}
