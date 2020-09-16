<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Sitemap\SitemapGenerator;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        SitemapGenerator::create(env('APP_URL'))
            ->writeToFile(public_path('sitemap.xml'), 'sitemap.xml');

        return 'site map aangemaakt';
    }
}
