<?php

namespace App\Providers;

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
        // Auto-create the SQLite database file if it does not exist
        $dbPath = config('database.connections.sqlite.database');
        if ($dbPath && ! file_exists($dbPath)) {
            touch($dbPath);
        }
    }
}
