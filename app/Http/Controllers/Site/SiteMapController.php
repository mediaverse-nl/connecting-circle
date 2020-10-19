<?php

namespace App\Http\Controllers\Site;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        $sitemap = SitemapGenerator::create(url('/'))
            ->getSitemap(url());

        $pages = Page::select(['slug', 'updated_at'])->get();

        foreach ($pages as $page) {
            $sitemap->add(Url::create('/test/' . $page->slug)
                ->setLastModificationDate($page->updated_at));
        }

        $sitemap->writeToFile(public_path('/sitemap.xml'));

        return 'site map aangemaakt test';
    }
}
