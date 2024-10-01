<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::prefix('restroapi')
                ->middleware('restroAp')
                ->namespace($this->namespace)
                ->group(base_path('routes/RestroApi.php'));

            Route::prefix('userapi')
                ->middleware('userAp')
                ->namespace($this->namespace)
                ->group(base_path('routes/UserApi.php'));

            Route::prefix('admin')
                ->middleware('admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::prefix('affiliate')
                ->middleware('affiliate')
                ->namespace($this->namespace)
                ->group(base_path('routes/affiliate.php'));

            Route::prefix('restro')
                ->middleware('restro')
                ->namespace($this->namespace)
                ->group(base_path('routes/restro.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('restaurant')
                ->group(base_path('routes/restaurant.php'));
        });
    }
}
