<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
            return "<?php echo \\Carbon\\Carbon::now()->format('Y-m-d'); ?>";

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
