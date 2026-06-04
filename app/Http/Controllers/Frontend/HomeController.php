<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\HeroImage;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama publik (Landing Page).
     */
    public function index()
    {
        $featuredProducts = Product::latest()->take(3)->get();
        $portfolios = Portfolio::inRandomOrder()->take(20)->get();
        $heroImages = HeroImage::inRandomOrder()->get();
        
        return view('frontend.home', compact('featuredProducts', 'portfolios', 'heroImages'));
    }
}
