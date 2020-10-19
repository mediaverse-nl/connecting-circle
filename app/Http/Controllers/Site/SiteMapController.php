<?php

namespace App\Http\Controllers\Site;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        $pages = Page::select(['slug', 'updated_at'])->get();

        $sitemap = SitemapGenerator::create(url('/'))
            ->getSitemap(url())
            ->shouldCrawl(function (UriInterface $url) use ($pages) {
                // All pages will be crawled, except the contact page.
                // Links present on the contact page won't be added to the
                // sitemap unless they are present on a crawlable page.

                foreach ($pages as $page) {
                    return strpos($url->getPath(), $page->slug) === false;
                }
            });

//        ->hasCrawled(function (Url $url) {
//        # Ignore if URL is not canonical
//        if(strpos($url->url, '?') !== false){
//            return;
//        }
//    }

        foreach ($pages as $page) {
            $sitemap->add(Url::create('/test/' . $page->slug)
                ->setLastModificationDate($page->updated_at));
        }

        $sitemap->writeToFile(public_path('/sitemap.xml'));

        return 'site map aangemaakt test';
    }
}
