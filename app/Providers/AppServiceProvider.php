<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

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
        RateLimiter::for('message', function (Request $request) {
            return Limit::perSecond(3)
                ->by($request->ip())
                ->response(function () {
                    return response()->json(['message' => 'Too many messages in a second. Are you ok?'], 429);
                });
        });

        RateLimiter::for('friendRequests', function (Request $request) {
            return Limit::perMinute(5)
                ->by($request->ip())
                ->response(function () {
                    return response()->json(['message' => 'Too many friend requests in a minute. Take it easy!'], 429);
                });
        });
    }
}
