<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Support\Facades\View;
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
        // Frontend Categories
        View::share('frontCategories', Category::where('is_active', 1)
            ->where('is_deleted', 0)
            ->get());

        // New Contact Messages Count
        View::composer('*', function ($view) {
            $newContactsCount = ContactUs::where('is_view', 0)->count();
            $view->with('newContactsCount', $newContactsCount);
        });
    }
}
