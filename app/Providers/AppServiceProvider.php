<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tentukan path public secara dinamis
        $publicPath = base_path('public'); // Default
        
        // Cek jika ada folder public_html di level yang sama dengan root project (hosting)
        // Gunakan realpath untuk memastikan path absolut yang benar
        $hostingPublic = realpath(base_path('../public_html'));
        
        if ($hostingPublic && is_dir($hostingPublic)) {
            $publicPath = $hostingPublic;
        }

        $this->app->usePublicPath($publicPath);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
