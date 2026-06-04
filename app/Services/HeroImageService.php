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
                $path = $image->store('hero_images', 'public');
                HeroImage::create(['image' => $path]);
            }
        } elseif (isset($data['image'])) {
            $path = $data['image']->store('hero_images', 'public');
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
