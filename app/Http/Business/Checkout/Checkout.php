<?php

namespace App\Http\Business\Checkout;

use App\Customer as CustomerModel;
use App\Transaction as TransactionModel;
use App\TransactionAddress as TransactionAddressModel;
use App\TransactionProduct as TransactionProductModel;
use App\Http\Business\Cart\Cart as CartBusiness;

class Checkout
{
    public function run($data)
    {
        $cartBusiness = new CartBusiness();

        $cart = CartBusiness::read();

        $customerCreate = CustomerCreate::run($data);

        $customer = CustomerModel::create($customerCreate);

        $transactionCreate = TransactionCreate::run($customer);

        $transaction = TransactionModel::create($transactionCreate);

        $transactionAddressCreate = TransactionAddressCreate::run($transaction, $data);

        $transactionAddress = TransactionAddressModel::create($transactionAddressCreate);

        foreach ($cart as $value) {
            $transactionProductCreate = TransactionProductCreate::run($transaction, $value);
            $transactionProduct = TransactionProductModel::create($transactionProductCreate);
        }

        $cartBusiness->dieCart();

        return $transaction;
    }
}
