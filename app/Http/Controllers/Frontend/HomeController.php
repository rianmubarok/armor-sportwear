<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama publik (Landing Page).
     */
    public function index()
    {
        return view('frontend.home');
    }
}
