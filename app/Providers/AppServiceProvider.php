<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Contracts\Routing\UrlGenerator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // UrlGenerator $url
        // if(!\App::environment('local')) {
        //     $url->forceScheme('https');
		// }
		
		view()->composer(
            'layouts.navbar.navbar', 
            function ($view) {
                $view->with('users', \App\User::where('role_id', '=', TRUE)->exists());
            }
        );

        view()->composer(
            'welcome', 
            function ($view) {
                $view->with('users', \App\User::where('role_id', '=', TRUE)->exists());
            }
        );
    }
}
