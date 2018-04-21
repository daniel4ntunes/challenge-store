<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Business\Cart\CartBusiness;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexAction()
    {
        $cart = CartBusiness::read();

        // Session::put('qty_in_cart', (new CartBusiness())->getQtyItemInCart());

        return view('Checkout.index')->with('cart', $cart);
    }
}
