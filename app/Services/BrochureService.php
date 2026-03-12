<?php

namespace App\Services;

use App\Models\Product;
use App\Models\CompanyProfile;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BrochureService
{
    /**
     * Generate the product brochure PDF and save it as a static file.
     */
    public static function generate(): string
    {
        $products = Product::with('category')->get();
        $profile = CompanyProfile::first();

        $pdf = Pdf::loadView('pdf.products', compact('products', 'profile'))
            ->setPaper('a4', 'portrait');

        $path = 'brochure/S_Tech_Product_Catalogue.pdf';

        // Save to storage/app/public/brochure/
        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }

    /**
     * Get the public URL of the brochure, generating if it doesn't exist.
     */
    public static function getUrl(): string
    {
        $path = 'brochure/S_Tech_Product_Catalogue.pdf';

        if (!Storage::disk('public')->exists($path)) {
            self::generate();
        }

        return asset('storage/' . $path);
    }

    /**
     * Check if a brochure file exists.
     */
    public static function exists(): bool
    {
        return Storage::disk('public')->exists('brochure/S_Tech_Product_Catalogue.pdf');
    }
}
