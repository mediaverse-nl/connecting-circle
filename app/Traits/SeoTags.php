<?php

namespace App\Traits;

use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use phpDocumentor\Reflection\Types\Parent_;

trait SeoTags
{
    use SEOToolsTrait;

    protected function pageInstance()
    {
        return new \App\Page();
    }

    public function getSlugPage()
    {
        $slug = str_replace(url('/'), '', url()->current());
        $slug = $slug == '' ? '/': $slug;
        return $slug;
    }

    protected function getCurrentPageEntry()
    {
        $page = $this->pageInstance()->where('slug','=', $this->getSlugPage());
        return $page->first() !== null ? $page->first() : null;
    }

    public function addPageSeo()
    {
        $page = $this->getCurrentPageEntry($this->pageInstance());

        if ($page !== null){
            $type = 'articles';
            //google seo
            $this->seo()->setTitle($page->meta_titel);
            $this->seo()->metatags()->addMeta('robots',($page->nofollow == 1 ? 'nofollow':'follow').','.($page->noindex == 1 ? 'noindex':'index'));
            $this->seo()->setDescription($page->meta_beschrijving);
            $this->seo()->setCanonical(url()->current());
            //opengraph
            $this->seo()->opengraph()->addImage(url('/').'/'.$page->meta_image_open_graph);
            $this->seo()->opengraph()->setUrl(url()->current());
            $this->seo()->opengraph()->setSiteName(env('APP_NAME'));
            $this->seo()->opengraph()->setTitle($page->meta_titel_open_graph);
            $this->seo()->opengraph()->setDescription($page->meta_beschrijving_open_graph);
            //twitter card
            $this->seo()->twitter()->setImage(url('/').'/'.$page->meta_image_twitter);
            $this->seo()->twitter()->setTitle($page->meta_titel_twitter);
            $this->seo()->twitter()->setDescription($page->meta_beschrijving_twitter);
            $this->seo()->twitter()->setUrl(url()->current());
            $this->seo()->twitter()->setSite(env('APP_NAME'));
            $this->seo()->twitter()->setType($type);
            //jsonld
            $this->seo()->jsonLd()->setType($type);
            $this->seo()->jsonLd()->setImage(url('/').'/'.$page->meta_image_open_graph);
            $this->seo()->jsonLd()->setTitle($page->meta_titel);
            $this->seo()->jsonLd()->setDescription($page->meta_beschrijving);
            $this->seo()->jsonLd()->setSite(env('APP_NAME'));
        }
    }
}
