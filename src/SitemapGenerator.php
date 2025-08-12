<?php

namespace Vendor\LaravelSitemap;

class SitemapGenerator
{
    protected array $urls = [];
    protected array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function add(string $url, string $lastmod = null): self
    {
        $format = $this->config['lastmod_format'] ?? 'Y-m-d';

        $this->urls[] = [
            'loc' => $url,
            'lastmod' => $lastmod ?? date($format),
        ];
        return $this;
    }

    public function render(): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($this->urls as $url) {
            $xml .= "  <url>" . PHP_EOL;
            $xml .= "    <loc>{$url['loc']}</loc>" . PHP_EOL;
            $xml .= "    <lastmod>{$url['lastmod']}</lastmod>" . PHP_EOL;
            $xml .= "  </url>" . PHP_EOL;
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
