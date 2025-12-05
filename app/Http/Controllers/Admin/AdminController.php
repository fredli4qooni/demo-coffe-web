<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $product_count  = Product::count();
        $category_count = Category::count();
        
        $recent_orders = Order::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact('product_count', 'category_count', 'recent_orders'));
    }
}