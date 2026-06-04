<?php

namespace App\Services;

use App\Models\HeroImage;
use Illuminate\Support\Facades\Storage;

class HeroImageService extends BaseService
{
    /**
     * Store multiple hero images in storage.
     */
    public function createHeroImages(array $data): void
    {
        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $path = $this->compressAndStoreImage($image, 'hero_images');
                HeroImage::create(['image' => $path]);
            }
        } elseif (isset($data['image'])) {
            $path = $this->compressAndStoreImage($data['image'], 'hero_images');
            HeroImage::create(['image' => $path]);
        }
    }

    /**
     * Remove the specified hero image from storage.
     */
    public function deleteHeroImage(HeroImage $heroImage): bool
    {
        if ($heroImage->image) {
            Storage::disk('public')->delete($heroImage->image);
        }

        return $heroImage->delete();
    }
}
