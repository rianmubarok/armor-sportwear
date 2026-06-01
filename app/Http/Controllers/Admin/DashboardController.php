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

        return view('admin.dashboard', compact('totalProducts'));
    }
}
