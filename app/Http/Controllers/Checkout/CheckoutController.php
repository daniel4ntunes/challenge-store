<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Business\Cart\Cart as CartBusiness;
use App\Http\Business\Checkout\Checkout as CheckoutBusiness;
use Illuminate\Support\Facades\Request;

class CheckoutController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function indexAction()
    {
        $cart = CartBusiness::read();

        if (empty($cart)) {
            header('Location: /cart', true, 302);
            exit;
        }

        return view('Checkout.index');
    }

    public function processAction()
    {
        $data = Request::all();

        $checkoutBusiness = new CheckoutBusiness();

        $checkoutBusiness->run($data);
    }
}
