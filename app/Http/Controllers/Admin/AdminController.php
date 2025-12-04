<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        // Data simple dulu
        $product_count  = Product::count();
        $category_count = Category::count();

        return view('admin.dashboard', compact('product_count', 'category_count'));
    }
}
