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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register global helper for currency formatting
        if (!function_exists('formatCurrency')) {
            function formatCurrency($amount) {
                return 'Rp ' . number_format($amount, 0, ',', '.');
            }
        }
    }
}
