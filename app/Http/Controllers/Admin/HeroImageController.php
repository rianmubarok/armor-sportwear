<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHeroImageRequest;
use App\Models\HeroImage;
use App\Services\HeroImageService;

class HeroImageController extends Controller
{
    public function __construct(private HeroImageService $heroImageService)
    {
    }

    public function index()
    {
        $heroImages = HeroImage::latest()->paginate(10);
        return view('admin.hero-images.index', compact('heroImages'));
    }

    public function create()
    {
        return view('admin.hero-images.create');
    }

    public function store(StoreHeroImageRequest $request)
    {
        $this->heroImageService->createHeroImages($request->validated());

        return redirect()->route('admin.hero-images.index')
            ->with('success', 'Hero Image berhasil ditambahkan.');
    }

    public function destroy(HeroImage $heroImage)
    {
        $this->heroImageService->deleteHeroImage($heroImage);

        return redirect()->route('admin.hero-images.index')
            ->with('success', 'Hero Image berhasil dihapus.');
    }
}
