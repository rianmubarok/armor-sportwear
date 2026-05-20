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
            $data['image'] = $data['image']->store('products', 'public');
        }

        return Product::create($data);
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
            $data['image'] = $data['image']->store('products', 'public');
        }

        $product->update($data);

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

        return $product->delete();
    }
}
