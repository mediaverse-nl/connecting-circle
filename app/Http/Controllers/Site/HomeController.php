<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
//use GoogleMaps\GoogleMaps;
use Artesaos\SEOTools\Facades\SEOMeta;
use GoogleMaps\Facade\GoogleMapsFacade;
use GoogleMaps\GoogleMaps;
use Illuminate\Http\Request;
use App\Traits\SeoTags;

class HomeController extends Controller
{
    use SeoTags;

    public function __invoke()
    {
        $this->addPageSeo();

        $page = $this->getCurrentPageEntry();

        return view('site.home',compact('page'));
    }
}
