<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if(!$cart || count($cart) == 0) {
            return redirect()->route('menu.index')->with('error', 'Keranjang Anda kosong.');
        }

        $total = 0;
        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart');
        $total_amount = 0;
        foreach($cart as $details) {
            $total_amount += $details['price'] * $details['quantity'];
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'invoice_number' => 'INV-' . date('Ymd') . '-' . mt_rand(1000, 9999),
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'total_amount' => $total_amount,
                'status' => 'pending',
                'payment_method' => $request->payment_method,
                'user_id' => Auth::id(),
            ]);

            foreach ($cart as $id => $details) {
                 OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'qty' => $details['quantity'],
                    'price' => $details['price'],
                    'subtotal' => $details['price'] * $details['quantity'],
                ]);
            }

            DB::commit();
            session()->forget('cart');

            if(Auth::check()) {
                return redirect()->route('user.orders.show', $order->id)->with('success', 'Pesanan dibuat! Silakan lakukan pembayaran.');
            } else {
                return redirect()->route('menu.index')->with('success', 'Silakan cek WA untuk instruksi bayar.');
            }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}