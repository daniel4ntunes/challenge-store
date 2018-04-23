<?php

namespace App\Http\Business\Checkout;

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

        TransactionProductValidator::run($transactionAddress);

        return $transactionAddress;
    }
}
