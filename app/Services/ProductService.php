<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService extends BaseService
{
    /**
     * Store a newly created product in storage.
     */
    public function createProduct(array $data): Product
    {
        // Generate slug
        $data['slug'] = Str::slug($data['name']) . '-' . uniqid();

        // Handle image upload
        if (isset($data['image'])) {
            $data['image'] = $this->compressAndStoreImage($data['image'], 'products');
        }

        $product = Product::create($data);

        // Handle gallery images
        if (isset($data['gallery_images']) && is_array($data['gallery_images'])) {
            foreach ($data['gallery_images'] as $image) {
                $path = $this->compressAndStoreImage($image, 'products/gallery');
                $product->images()->create(['image' => $path]);
            }
        }

        return $product;
    }

    /**
     * Update the specified product in storage.
     */
    public function updateProduct(Product $product, array $data): Product
    {
        // Update slug only if name changes
        if (isset($data['name']) && $data['name'] !== $product->name) {
            $data['slug'] = Str::slug($data['name']) . '-' . uniqid();
        }

        // Handle image upload & delete old image
        if (isset($data['image'])) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $this->compressAndStoreImage($data['image'], 'products');
        }

        $product->update($data);

        // Handle gallery images
        if (isset($data['gallery_images']) && is_array($data['gallery_images'])) {
            foreach ($data['gallery_images'] as $image) {
                $path = $this->compressAndStoreImage($image, 'products/gallery');
                $product->images()->create(['image' => $path]);
            }
        }

        return $product;
    }

    /**
     * Remove the specified product from storage.
     */
    public function deleteProduct(Product $product): bool
    {
        // Delete image physical file
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete gallery images physically
        foreach ($product->images as $galleryImage) {
            Storage::disk('public')->delete($galleryImage->image);
        }

        return $product->delete();
    }
}
