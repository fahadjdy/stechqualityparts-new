<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CompanyProfile;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductPdfController extends Controller
{
    public function generate()
    {
        $products = Product::with('category')->get();
        $profile = CompanyProfile::first();

        $pdf = Pdf::loadView('pdf.products', compact('products', 'profile'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('S_Tech_Product_Catalogue.pdf');
    }
}
