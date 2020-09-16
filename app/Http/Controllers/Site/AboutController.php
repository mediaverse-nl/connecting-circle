<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Traits\SeoTags;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use SeoTags;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->addPageSeo();

        $page = $this->getCurrentPageEntry();

        return view('site.about', compact('page'));
    }

}
