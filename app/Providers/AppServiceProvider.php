<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Role;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $roles = Role::all();
        $events = Event::all();
        
        view()->share(["roles" => $roles]);


        view()->share(["events" => $events]);
    }
}
