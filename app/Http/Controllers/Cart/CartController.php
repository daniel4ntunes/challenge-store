<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Business\Cart\Cart as CartBusiness;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function indexAction()
    {
        $cart = CartBusiness::read();

        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        return view('Cart.index')->with('cart', $cart);
    }

    public function addAction()
    {
        $id = Request::input('id_product');

        $cartBusiness = new CartBusiness();

        if ($cartBusiness->add($id)) {
            session()->flash('success_message', 'Produto adicionado ao carrinho!');
        }

        return Response::json('', http_response_code())
            ->header('Content-type', 'application/json');
    }

    public function updateAction()
    {
        $id = Request::route('id_cart');
        $qty = Request::route('qty');

        (new CartBusiness())->update($id, $qty);

        return Response::json('', http_response_code())
            ->header('Content-type', 'application/json');
    }

    public function deleteAction()
    {
        $id = Request::route('id_cart');

        (new CartBusiness())->delete($id);

        return Response::json('', http_response_code())
            ->header('Content-type', 'application/json');
    }
}
