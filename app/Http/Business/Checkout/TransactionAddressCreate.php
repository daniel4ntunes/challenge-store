<?php

namespace App\Http\Business\Checkout;

use Illuminate\Support\Facades\Validator;

class TransactionAddressCreate
{
    public static function run($transaction, $data)
    {
        $transactionAddress = [
            'transaction_id' => $transaction->id,
            'zipcode' => str_replace('-', '', $data['zipcode']),
            'street' => $data['street'],
            'number' => $data['number'],
            'complement' => $data['complement'],
            'neighbourhood' => $data['neighbourhood'],
            'city' => $data['city'],
            'state' => $data['state'],
        ];

        $validator = Validator::make($transactionAddress, [
            'transaction_id' => 'required',
            'zipcode' => 'required',
            'street' => 'required',
            'number' => 'required',
            'neighbourhood' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        if ($validator->fails()) {
            throw new \Exception('Campos Obrigatórios', 400);
        }

        return $transactionAddress;
    }
}
