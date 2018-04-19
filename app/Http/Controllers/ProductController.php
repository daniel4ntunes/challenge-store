<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Request;
use Illuminate\Support\Facades\DB;

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

        return view('index')->with('products', $products);
    }

    public function detail()
    {
        $product = Product::where('id', $this->id)->first();
        $categories = ProductCategory::select(DB::raw('Category.name'))
            ->join('Category', 'Category.id', '=', 'ProductCategory.category_id')
            ->where('ProductCategory.product_id', '=', $this->id)
            ->get();

        return view('product')->with(['product' => $product, 'categories' => $categories]);
    }
}
