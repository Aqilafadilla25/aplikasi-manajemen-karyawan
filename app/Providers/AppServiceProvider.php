<?php

namespace App\Providers;

use App\Models\Leave;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function ($view) {
        if (auth::check() && auth::user()->role === 'admin') {
            $pendingLeavesCount = Leave::where('status', 'pending')->count();
            $view->with('pendingLeavesCount', $pendingLeavesCount);
        }
    });
    }
}
