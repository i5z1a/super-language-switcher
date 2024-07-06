<?php

namespace I5z1a\LanguageSwitcher\Providers;

use Illuminate\Support\ServiceProvider;
use I5z1a\LanguageSwitcher\Commands\InstallLanguageFiles;

class LanguageSwitcherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the command
        $this->commands([
            InstallLanguageFiles::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish assets
        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/language-switcher'),
        ], 'public');
    }
}