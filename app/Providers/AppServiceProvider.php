<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Collaborator;
use App\Models\Example;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('App\Models\Example', function () {
            $collaborator = new Collaborator();
            $foo = 'foobar';
            return new Example($collaborator,$foo);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
