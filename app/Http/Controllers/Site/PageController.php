<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Traits\SeoTags;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use SeoTags;

    public function show($page)
    {
        $this->addPageSeo();

        $page = $this->getCurrentPageEntry();

        if ($page !== null){
            return view('site.pages.default', compact('page'));
        }

        abort(404);
    }
}
