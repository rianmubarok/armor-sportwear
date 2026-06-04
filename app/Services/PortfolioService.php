<?php

namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioService extends BaseService
{
    /**
     * Store a newly created portfolio in storage.
     */
    public function createPortfolio(array $data): void
    {
        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $path = $this->compressAndStoreImage($image, 'portfolios');
                Portfolio::create(['image' => $path]);
            }
        } elseif (isset($data['image'])) {
            // Fallback for single image just in case
            $path = $this->compressAndStoreImage($data['image'], 'portfolios');
            Portfolio::create(['image' => $path]);
        }
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function updatePortfolio(Portfolio $portfolio, array $data): Portfolio
    {
        // Handle image upload & delete old image
        if (isset($data['image'])) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $data['image'] = $this->compressAndStoreImage($data['image'], 'portfolios');
        }

        $portfolio->update($data);

        return $portfolio;
    }

    /**
     * Remove the specified portfolio from storage.
     */
    public function deletePortfolio(Portfolio $portfolio): bool
    {
        // Delete image physical file
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        return $portfolio->delete();
    }
}
