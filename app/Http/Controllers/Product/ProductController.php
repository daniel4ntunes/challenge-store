<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product as ProductModel;
use App\ProductCategory as ProductCategoryModel;
use App\Http\Business\Cart\Cart as CartBusiness;

class ProductController extends Controller
{
    public function indexAction()
    {
        $products = ProductModel::all();

        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        return view('Product.index')->with('products', $products);
    }

    public function detailAction($id)
    {
        $product = ProductModel::find($id);

        if (empty($product)) {
            throw new \Exception('Item não encontrado', 400);
        }

        $categories = ProductCategoryModel::select(DB::raw('Category.name'))
            ->join('Category', 'Category.id', '=', 'ProductCategory.category_id')
            ->where('ProductCategory.product_id', '=', $id)
            ->get();

        return view('Product.details')->with(['product' => $product, 'categories' => $categories]);
    }
}
