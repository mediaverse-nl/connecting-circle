<?php

namespace App\Http\Controllers\Site;

use App\Page;
use App\Http\Controllers\Controller;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        $pages = Page::select(['slug', 'updated_at'])->get();

        $sitemap = SitemapGenerator::create(url('/'))
            ->getSitemap(url())
            ->hasCrawled(function (Url $url) use ($pages) {
                // All pages will be crawled, except the contact page.
                // Links present on the contact page won't be added to the
                // sitemap unless they are present on a crawlable page.

                foreach ($pages as $page) {
                    if ($url->segment(1) === $page->slug) {
                        return;
                    }
                }
                return $url;
            });

//        ->hasCrawled(function (Url $url) {
//        # Ignore if URL is not canonical
//        if(strpos($url->url, '?') !== false){
//            return;
//        }
//    }

        foreach ($pages as $page) {
            $sitemap->add(Url::create($page->slug)
                ->setLastModificationDate($page->updated_at));
        }

        $sitemap->writeToFile(public_path('/sitemap.xml'));

        return 'site map aangemaakt test';
    }
}
