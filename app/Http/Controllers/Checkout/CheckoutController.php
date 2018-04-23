<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Business\Cart\Cart as CartBusiness;
use App\Http\Business\Checkout\Checkout as CheckoutBusiness;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class CheckoutController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function indexAction()
    {
        $cart = CartBusiness::read();

        if ($cart->isEmpty()) {
            return redirect('cart');
        }

        return view('Checkout.index');
    }

    public function processAction()
    {
        $data = Request::all();

        (new CheckoutBusiness())->run($data);

        return Response::json(['url' => '/transaction'], http_response_code())
            ->header('Content-type', 'application/json');
    }
}
