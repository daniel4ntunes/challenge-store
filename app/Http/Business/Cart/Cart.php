<?php

namespace App\Http\Business\Cart;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Product as ProductModel;
use App\Cart as CartModel;

class Cart
{
    public static function read()
    {
        return CartModel::select(DB::raw('Cart.*, Product.name, Product.image'))
            ->join('Product', 'Product.id', '=', 'Cart.product_id')
            ->where('session_id', '=', Request::session()->getId())
            ->get();
    }

    public function add($id)
    {
        $cart = CartModel::where('session_id', '=', Request::session()->getId())
            ->where('product_id', '=', $id)->first();

        if (!$cart) {
            $cart = new CartModel();
        }

        $product = ProductModel::find($id);

        if (is_null($product)) {
            throw new \Exception('Produto não encontrado', 400);
        }

        $cart->session_id = Request::session()->getId();
        $cart->product_id = $id;
        $cart->date = new \DateTime();
        $cart->quantity = $this->validateQty(($cart->quantity ? $cart->quantity : 0) + 1);
        $cart->unit_price = $this->validateUnitPrice($product->price);
        $cart->ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');

        $cart->save();

        return $cart;
    }

    public function update($id, $qty)
    {
        $cart = CartModel::find($id);

        if (is_null($cart)) {
            throw new \Exception('Item não encontrado', 400);
        }

        $this->validateQty($qty);

        $cart->date = new \DateTime();
        $cart->quantity = $qty;

        $cart->save();

        return $cart;
    }

    public function delete($id)
    {
        $cart = CartModel::find($id);

        if (is_null($cart)) {
            throw new \Exception('Produto não existe no carrinho de compras', 400);
        }

        $cart->delete();

        return $cart;
    }

    public function validateQty($qty)
    {
        if ($qty <= 0) {
            throw new \Exception('Quantidade não permitida', 400);
        }

        return $qty;
    }

    public function validateUnitPrice($price)
    {
        if (is_null($price)) {
            throw new \Exception('Produto sem preço unitário', 400);
        }

        return $price;
    }

    public static function getQtyItemInCart()
    {
        $qty = 0;
        $cart = CartModel::where('session_id', '=', Request::session()->getId())
            ->get();
        if ($cart) {
            foreach ($cart as $value) {
                $qty += $value->quantity;
            }
        }

        return $qty;
    }

    public static function getTotalCart()
    {
        $total = 0;
        $cart = CartModel::where('session_id', '=', Request::session()->getId())
            ->get();
        if ($cart) {
            foreach ($cart as $value) {
                $total += $value->unit_price * $value->quantity;
            }
        }

        return $total;
    }

    public function dieCart()
    {
        $cart = CartModel::where('session_id', '=', Request::session()->getId())
            ->get();
        foreach ($cart as $key => $value) {
            $this->delete($value->id);
        }
    }
}
