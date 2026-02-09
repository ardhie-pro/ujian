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
        $this->app->bind('path.public', function() {
            // Deteksi folder public_html jika ada di level yang sama dengan root project (hosting)
            if (file_exists(base_path('../public_html'))) {
                return base_path('../public_html');
            }
            // Fallback ke folder public default
            return base_path('public');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
