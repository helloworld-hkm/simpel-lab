<?php

namespace App\Providers;

use App\Models\Lab;
use App\Models\Perbaikan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
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
        //     $lab_id= Lab::where('role_id','5')->pluck('id')->toArray();
        // $perbaikanCount = Perbaikan::where('status','menunggu perbaikan')->whereIn('lab_id',$lab_id)->count();
        // // Bagikan data ke semua view
        // View::share('perbaikanCount', $perbaikanCount);
        if (Schema::hasTable('lab') ) {
            $labIds = Lab::where('role_id', '5')->pluck('id')->toArray();        
            $perbaikanCount = Perbaikan::where('status', 'menunggu perbaikan')->whereIn('lab_id', $labIds)->count();      
            View::share('perbaikanCount', $perbaikanCount);
        } else {
            Log::info('CountPerbaikan: Labs or Perbaikans table does not exist.');
        }
    }
}
