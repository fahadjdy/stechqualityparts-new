<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\BrochureService;

class ProductObserver
{
    /**
     * Regenerate brochure after a product is created.
     */
    public function created(Product $product): void
    {
        BrochureService::generate();
    }

    /**
     * Regenerate brochure after a product is updated.
     */
    public function updated(Product $product): void
    {
        BrochureService::generate();
    }

    /**
     * Regenerate brochure after a product is deleted.
     */
    public function deleted(Product $product): void
    {
        BrochureService::generate();
    }
}
