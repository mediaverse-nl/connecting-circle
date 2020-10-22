<?php

namespace App\Http\Controllers\Site;

use App\Page;
use App\Http\Controllers\Controller;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        generateSitemap();

        return 'site map aangemaakt ga naar <a href="/sitemap.xml">/sitemap.xml</a>';
    }
}
