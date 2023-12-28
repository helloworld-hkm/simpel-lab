<?php

namespace App\Providers;

use App\Models\Perbaikan;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::directive('carbonNow', function ($expression) {
            return "<?php echo \\Carbon\\Carbon::now()->format('Y-m-d h:i:s A'); ?>";

        });
        Blade::directive('carbonNowShort', function ($expression) {
            return "<?php echo \\Carbon\\Carbon::now()->locale('id')->isoFormat('dddd, DD/MM/Y'); ?>";

        });
        Blade::directive('carbon', function ($expression) {
            return "<?php echo \\Carbon\\Carbon::parse($expression)->locale('id')->isoFormat('dddd, DD/MM/Y'); ?>";

        });
        Blade::directive('carbon_short', function ($expression) {
            return "<?php echo \\Carbon\\Carbon::parse($expression)->locale('id')->format('d/m/Y'); ?>";

        });
        Blade::directive('carbon_mid', function ($expression) {
            return "<?php echo \\Carbon\\Carbon::parse($expression)->locale('id')->format('d/m/Y'); ?>";

        });
        Blade::directive('carbon_date', function ($expression) {
            return "<?php echo \\Carbon\\Carbon::parse($expression)->locale('id')->isoFormat('DD MMMM Y'); ?>";

        });

        Blade::directive('countPC', function ($expression) {


            return "<?php   echo DB::table('pc')->where('lab_id', $expression)->count(); ?>";
        });

        Blade::directive('getPerbaikanCount', function () {
            "<?php
            if(auth()->check()) {
                if(auth()->user()->role->id == '4' || auth()->user()->role->id == '2') {
                    \$lab_id = Lab::where('role_id', '4')->pluck('id')->toArray();
                } else if(auth()->user()->role->id == '5' || auth()->user()->role->id == '3') {
                    \$lab_id = Lab::where('role_id', '5')->pluck('id')->toArray();
                } else {
                    \$lab_id = [];
                }
            } else {
                \$lab_id = [];
            }

            \$perbaikanCount = Perbaikan::where('status', 'menunggu perbaikan')->whereIn('lab_id', \$lab_id)->count();
            echo \$perbaikanCount;
        ?>";
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin',function(User $user){
            return $user->role->role =='admin';
        });
        Gate::define('maintenanceRepair',function(User $user){
            $allowedRoles = ['4', '5'];
            return in_array($user->role->id, $allowedRoles);
        });
        Gate::define('kepala',function(User $user){
            $allowedRoles = ['2', '3'];
            return in_array($user->role->id, $allowedRoles);
        });
    }
}
