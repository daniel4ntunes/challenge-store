<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Product;
use App\ProductCategory;

class ProductController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = Request::route('id');
    }

    public function index()
    {
        $products = Product::select()->get();

        return view('product.index')->with('products', $products);
    }

    public function detail()
    {
        $product = Product::where('id', $this->id)->first();
        $categories = ProductCategory::select(DB::raw('Category.name'))
            ->join('Category', 'Category.id', '=', 'ProductCategory.category_id')
            ->where('ProductCategory.product_id', '=', $this->id)
            ->get();

        return view('product.details')->with(['product' => $product, 'categories' => $categories]);
    }
}
