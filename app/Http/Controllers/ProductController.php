<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // ❗ WAJIB TAMBAH INI
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil kategori beserta produk aktif
        $categories = Category::with(['products' => function ($q) {
            $q->where('is_active', true);
        }])->get();

        return view('products.index', compact('categories'));
    }

    // 🔥 INI YANG BELUM ADA → TAMBAHKAN
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('products.show', compact('product'));
    }
}
