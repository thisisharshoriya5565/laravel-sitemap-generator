<?php

namespace Vendor\LaravelSitemap;

use Illuminate\Support\ServiceProvider;

class LaravelSitemapServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->singleton('sitemap', function () {
        //     return new SitemapGenerator();
        // });

        // Merge config so it’s usable even if not published
        $this->mergeConfigFrom(
            __DIR__ . '/../config/sitemap.php',
            'sitemap'
        );

        $this->app->singleton('sitemap', function () {
            return new SitemapGenerator(config('sitemap'));
        });
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/../config/sitemap.php' => config_path('sitemap.php'),
        ], 'config');
    }
}
