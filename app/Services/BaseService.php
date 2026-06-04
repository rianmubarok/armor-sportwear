<?php

namespace App\Services;

abstract class BaseService
{
    // Layer dasar untuk logika bisnis. 
    // Semua class service spesifik (misalnya ProductService) dapat extends class ini nanti.

    /**
     * Compress an image and store it to the public disk as WEBP.
     */
    protected function compressAndStoreImage($file, string $directory): string
    {
        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $image = $manager->read($file->getPathname());
        
        // Resize proportionally if larger than 1920x1920
        $image->scaleDown(1920, 1920);
        
        $filename = uniqid() . '.webp';
        $path = $directory . '/' . $filename;
        
        \Illuminate\Support\Facades\Storage::disk('public')->put($path, (string) $image->toWebp(80));
        
        return $path;
    }
}
