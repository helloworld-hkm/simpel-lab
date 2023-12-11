<?php

namespace App\Providers;

use App\Models\Lab;
use App\Models\Perbaikan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class countPerbaikanTKJT extends ServiceProvider
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

        $lab_id= Lab::where('role_id','4')->pluck('id')->toArray();
        $perbaikanCount = Perbaikan::where('status','menunggu perbaikan')->whereIn('lab_id',$lab_id)->count();
        // Bagikan data ke semua view
        View::share('perbaikanCountTKJT', $perbaikanCount);
    }
}
