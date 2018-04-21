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

        $customer = new CustomerModel();
        $customer->name = $data['name'];
        $customer->cpf = $data['cpf'];
        $customer->phone = $data['phone'];
        $customer->save();

        $transaction = new TransactionModel();

        if ($customer->id) {
            $transaction->date_added = new \DateTime();
            $transaction->customer_id = $customer->id;
            $transaction->total = CartBusiness::getTotalCart();
            $transaction->save();
        }

        $transactionAddress = new TransactionAddressModel();

        if ($transaction->id) {
            $transactionAddress->transaction_id = $transaction->id;
            $transactionAddress->zipcode = str_replace('-', '', $data['zipcode']);
            $transactionAddress->street = $data['street'];
            $transactionAddress->number = $data['number'];
            $transactionAddress->complement = $data['complement'];
            $transactionAddress->neighbourhood = $data['neighbourhood'];
            $transactionAddress->city = $data['city'];
            $transactionAddress->state = $data['state'];
            $transactionAddress->save();

            foreach ($cart as $value) {
                $transactionProduct = new TransactionProductModel();
                $transactionProduct->transaction_id = $transaction->id;
                $transactionProduct->des = $value->name;
                $transactionProduct->unit_price = $value->unit_price;
                $transactionProduct->quantity = $value->quantity;
                $transactionProduct->product_id = $value->product_id;
                $transactionProduct->save();
            }
        }

        $cartBusiness->dieCart();
    }
}
