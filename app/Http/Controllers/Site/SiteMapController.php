<?php

namespace App\Http\Controllers\Site;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SiteMapController extends Controller
{
    public function __invoke()
    {
        $sitemap = Sitemap::create();

        $pages = Page::select(['slug', 'updated_at'])->get();

        foreach ($pages as $page) {
            $sitemap->add(Url::create('' . $page->slug)
                ->setLastModificationDate($page->updated_at));
        }

        $sitemap->writeToFile(public_path('/sitemap.xml'));

        return 'site map aangemaakt';
    }
}
