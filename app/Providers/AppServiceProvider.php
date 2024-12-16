<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\User;
use App\Policies\ImagePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::before(function (User $user){
            if ($user->role === 'admin') {
                return true;
            }
        });

        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });

        Gate::policy(Image::class, ImagePolicy::class);
    }
}
