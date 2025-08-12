# Laravel Sitemap Generator
A lightweight Laravel package for dynamically generating XML sitemaps.**

## Installation

```bash
composer require thisisharshoriya5565/laravel-sitemap-generator
php artisan vendor:publish --provider="Vendor\LaravelSitemap\LaravelSitemapServiceProvider" --tag="config"
```

---
Configuration
  - The config file config/sitemap.php includes:
  - lastmod_format: Default format for last modification dates (default: Y-m-d).
  - filename: Default sitemap filename (default: sitemap.xml).

```php
return [
  'lastmod_format' => 'Y-m-d',
  'filename' => 'sitemap.xml',
];
```

Usage
Via Facade (recommended)
```php
use Sitemap;

Route::get('/sitemap.xml', function () {
    return response(
        Sitemap::add(url('/'), now()->toIso8601String())
               ->add(url('/about'))
               ->render(),
        200,
        ['Content-Type' => 'application/xml']
    );
});
```

Via Service Container
```php
Route::get('/sitemap.xml', function () {
    $sitemap = app('sitemap')
        ->add(url('/'))
        ->add(url('/contact'));
    return response($sitemap->render(), 200)
           ->header('Content-Type', 'application/xml');
});
```

Contribution
  - Fork the repo
  - Submit pull requests with descriptive commit messages
  - Follow PSR‑12 coding style
  - Run tests before submitting

License
MIT © Bhanu Pratap Soni

###  Why This Works

- **Naming**: Follows best practices—lowercase, hyphens, meaningful terms for clarity and SEO :contentReference[oaicite:2]{index=2}.  
- **README**: A clean, guided structure helps both maintainers and new users get started quickly :contentReference[oaicite:3]{index=3}.

---

Would you like me to draft files like `README.md`, `.gitignore`, or even the initial `composer.json` for the Git repo?
::contentReference[oaicite:4]{index=4}






