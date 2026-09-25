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
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('school_profiles')) {
                \Illuminate\Support\Facades\View::composer('*', function ($view) {
                    $view->with('profile', \App\Models\SchoolProfile::first());
                });
            }
        } catch (\Throwable $e) {
            // Ignore during initial installation or migration
        }
    }
}
