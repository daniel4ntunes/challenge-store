<?php

namespace App\Http\Business\Checkout;

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

        CustomerValidator::run($customer);

        return $customer;
    }
}
