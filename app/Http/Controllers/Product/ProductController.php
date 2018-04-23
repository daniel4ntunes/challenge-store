<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product as ProductModel;
use App\Http\Business\Cart\Cart as CartBusiness;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function indexAction()
    {
        $products = ProductModel::all();

        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        $search = Request::get('search');

        if (!empty($search)) {
            $products = ProductModel::where('name', 'like', '%'.$search.'%')
                ->orderBy('name')
                ->get();
        }

        return view('Product.index')->with(['products' => $products, 'search' => $search]);
    }

    public function detailAction($id)
    {
        $product = ProductModel::find($id);

        if (empty($product)) {
            throw new \Exception('Item não encontrado', 400);
        }

        return view('Product.details')->with(['product' => $product]);
    }
}
