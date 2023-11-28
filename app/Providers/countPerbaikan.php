<?php

namespace App\Providers;

use App\Models\Perbaikan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class countPerbaikan extends ServiceProvider
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
        $perbaikanCount = Perbaikan::where('status','menunggu perbaikan')->count();

        // Bagikan data ke semua view
        View::share('perbaikanCount', $perbaikanCount);
    }
}
