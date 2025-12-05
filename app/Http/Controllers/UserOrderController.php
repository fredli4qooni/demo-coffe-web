<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())
                      ->where('id', $id)
                      ->with('items.product')
                      ->firstOrFail();

        return view('orders.show', compact('order'));
    }
}