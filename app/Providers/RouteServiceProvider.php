<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            // Route cho web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Route cho admin
            Route::prefix('admin')
                ->middleware('web')
                ->group(base_path('routes/admin.php'));
        });
    }
}
