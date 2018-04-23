<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product as ProductModel;
use Illuminate\Support\Facades\Request;
use App\ProductCategory as ProductCategoryModel;
use App\Http\Business\Cart\Cart as CartBusiness;

class ProductController extends Controller
{
    public function indexAction()
    {
        $products = ProductModel::all();

        $search = Request::get('search');

        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        if (!empty($search)) {
            $products = ProductModel::where('name', 'like', '%'.$search.'%')
                ->orderBy('name')
                ->get();
        }

        return view('Product.index')->with([
            'products' => $products,
            'search' => $search,
        ]);
    }

    public function detailAction($id)
    {
        $product = ProductModel::find($id);
        $categories = ProductCategoryModel::select()
            ->leftJoin('Category', 'Category.id', '=', 'ProductCategory.category_id')
            ->orderBy('Category.name', 'asc')
            ->where('ProductCategory.product_id', '=', $id)
            ->get();

        if (empty($product)) {
            throw new \Exception('Item não encontrado', 400);
        }

        return view('Product.details')->with(['product' => $product, 'categories' => $categories]);
    }
}
