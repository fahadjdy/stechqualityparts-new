<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanyProfile;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->runningInConsole()) {
            // Cache social media for 24 hours to reduce load
            $socialmedia = cache()->remember('socialmedia_shared', 86400, function () {
                return SocialMedia::all();
            });
            View::share('socialmedia', $socialmedia);

            // Cache company profile for 24 hours
            $profile = cache()->remember('company_profile_shared', 86400, function () {
                return CompanyProfile::first();
            });
            View::share('profile', $profile);
        }
    }
}
