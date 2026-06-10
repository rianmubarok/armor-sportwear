<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('items.product')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('admin.orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'total_price' => 'nullable|numeric',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|exists:products,id',
            'items.*.custom_design' => 'nullable|string|max:255',
            'items.*.player_name' => 'nullable|string|max:255',
            'items.*.player_number' => 'nullable|string|max:20',
            'items.*.size' => 'nullable|string|max:10',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        foreach ($request->items as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'] ?? null,
                'custom_design' => $item['custom_design'] ?? null,
                'player_name' => $item['player_name'] ?? null,
                'player_number' => $item['player_number'] ?? null,
                'size' => $item['size'] ?? null,
                'quantity' => $item['quantity'] ?? 1,
            ]);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan dan rincian item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('items.product');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order->load('items');
        $products = Product::orderBy('name')->get();
        return view('admin.orders.edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'total_price' => 'nullable|numeric',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|exists:products,id',
            'items.*.custom_design' => 'nullable|string|max:255',
            'items.*.player_name' => 'nullable|string|max:255',
            'items.*.player_number' => 'nullable|string|max:20',
            'items.*.size' => 'nullable|string|max:10',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order->update([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        // Hapus item lama, lalu masukkan yang baru
        $order->items()->delete();

        foreach ($request->items as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'] ?? null,
                'custom_design' => $item['custom_design'] ?? null,
                'player_name' => $item['player_name'] ?? null,
                'player_number' => $item['player_number'] ?? null,
                'size' => $item['size'] ?? null,
                'quantity' => $item['quantity'] ?? 1,
            ]);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan dan rincian item berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
