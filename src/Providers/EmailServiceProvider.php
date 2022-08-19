<?php

namespace Boostech\Email\Providers;

use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->make('Boostech\Email\Controllers\HmailController'); // Namespace\NomeController
        //$this->loadViewsFrom(__DIR__ . '/views', 'calculator');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    public function boot()
    {
        include __DIR__ . '/../routes/web.php';
    }
}
