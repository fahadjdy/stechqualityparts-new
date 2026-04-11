<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductPdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('products', [HomeController::class, 'products'])->name('products.index');
Route::get('category/{category}', [HomeController::class, 'category'])->name('category.show');
Route::get('product/{product}', [HomeController::class, 'product'])->name('product.show');
Route::get('gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

Route::get('/products/brochure', [ProductPdfController::class, 'generate'])
    ->name('products.brochure');

Route::get('/migration', function () {
    Artisan::call('migrate', ['--force' => true]);
    return '<pre>' . Artisan::output() . '</pre>';
});
