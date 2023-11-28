<?php

namespace App\Providers;

use App\Models\Lab;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class countLab extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $computerCount = Lab::where('id',122)->count();

        // Bagikan data ke semua view
        View::share('computerCount', $computerCount);

    }
}
