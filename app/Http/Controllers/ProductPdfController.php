<?php

namespace App\Http\Controllers;

use App\Services\BrochureService;

class ProductPdfController extends Controller
{
    /**
     * Serve the static brochure PDF. Generate it if it doesn't exist yet.
     */
    public function generate()
    {
        $url = BrochureService::getUrl();

        return redirect($url);
    }
}
