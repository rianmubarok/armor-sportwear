<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the product catalog.
     */
    public function index()
    {
        $products = Product::latest()->paginate(9); // 3x3 grid
        return view('frontend.products.index', compact('products'));
    }

    /**
     * Display the specified product detail.
     */
    public function show(Product $product)
    {
        return view('frontend.products.show', compact('product'));
    }
}
