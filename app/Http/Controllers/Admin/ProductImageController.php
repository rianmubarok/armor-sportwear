<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function destroy(ProductImage $productImage)
    {
        if ($productImage->image) {
            Storage::disk('public')->delete($productImage->image);
        }
        
        $productImage->delete();

        return back()->with('success', 'Gambar galeri berhasil dihapus.');
    }
}
