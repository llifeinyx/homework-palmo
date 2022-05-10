<?php

namespace App\Providers;

use App\Services\FileHelperService;
use Illuminate\Support\ServiceProvider;

class FileHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('file', function() {
            return new FileHelperService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
