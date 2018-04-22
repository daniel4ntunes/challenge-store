<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Business\Cart\Cart as CartBusiness;

class AccountController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function indexAction()
    {
        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        return view('Account.index');
    }
}
