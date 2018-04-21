<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Product as ProductModel;
use App\ProductCategory as ProductCategoryModel;
use App\Http\Business\Cart\Cart as CartBusiness;

class ProductController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = Request::route('id_product');
    }

    public function indexAction()
    {
        $products = ProductModel::select()->get();

        session(['qty_in_cart' => CartBusiness::getQtyItemInCart()]);

        return view('Product.index')->with('products', $products);
    }

    public function detailAction()
    {
        $product = ProductModel::where('id', $this->id)->first();
        $categories = ProductCategoryModel::select(DB::raw('Category.name'))
            ->join('Category', 'Category.id', '=', 'ProductCategory.category_id')
            ->where('ProductCategory.product_id', '=', $this->id)
            ->get();

        return view('Product.details')->with(['product' => $product, 'categories' => $categories]);
    }
}
