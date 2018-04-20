<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Request;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->read();

        Session::put('qty_in_cart', $this->getQtyItemInCart());

        return view('cart.index')->with('cart', $cart);
    }

    public function read()
    {
        return Cart::select(DB::raw('Cart.*, Product.name, Product.image'))
            ->join('Product', 'Product.id', '=', 'Cart.product_id')
            ->where('session_id', '=', Request::session()->getId())
            ->get();
    }

    public function add()
    {
        $id = Request::input('id_product');

        $cart = Cart::where('session_id', '=', Request::session()->getId())
            ->where('product_id', '=', $id)->first();

        if (!$cart) {
            $cart = new Cart();
        }

        $product = Product::find($id);

        if (is_null($product)) {
            throw new \Exception('Produto não encontrado', 400);
        }

        $cart->session_id = Request::session()->getId();
        $cart->product_id = $id;
        $cart->date = new \DateTime();
        $cart->quantity = $this->validateQty(($cart->quantity ? $cart->quantity : 0) + 1);
        $cart->unit_price = $product->price;
        $cart->ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');

        if ($cart->save()) {
            session()->flash('success_message', 'Produto adicionado ao carrinho!');
        }

        return Response::json('', http_response_code())
            ->header('Content-type', 'application/json');
    }

    public function delete()
    {
        $id = Request::route('id_cart');

        $cart = Cart::find($id);

        if (is_null($cart)) {
            throw new \Exception('Produto não existe no carrinho de compras', 400);
        }

        $cart->delete();

        return Response::json('', http_response_code())
            ->header('Content-type', 'application/json');
    }

    public function validateQty($qty)
    {
        if ($qty <= 0) {
            throw new \Exception('Quantidade não permitida', 400);
        }

        return $qty;
    }

    public function getQtyItemInCart()
    {
        $qty = 0;
        $cart = Cart::where('session_id', '=', Request::session()->getId())
            ->get();
        if ($cart) {
            foreach ($cart as $value) {
                $qty += $value->quantity;
            }
        }

        return $qty;
    }
}
