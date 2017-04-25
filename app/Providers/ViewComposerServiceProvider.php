<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose data to the Sidebar.
     */
    public function composeSidebar()
    {
        view()->composer('character.partials.sidebar', function ($view) {
            $view->with('character', \App\Character::find(session('character')));
        });
    }
}
