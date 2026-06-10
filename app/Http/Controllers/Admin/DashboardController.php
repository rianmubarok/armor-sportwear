<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): \Illuminate\View\View
    {
        $totalProducts = Product::count();
        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
        $processingOrders = \App\Models\Order::where('status', 'processing')->count();
        $completedOrders = \App\Models\Order::where('status', 'completed')->count();

        return view('admin.dashboard', compact('totalProducts', 'pendingOrders', 'processingOrders', 'completedOrders'));
    }
}
