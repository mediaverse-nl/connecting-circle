<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\SeoTags;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use SeoTags;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = $this->pageInstance()->get();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $page = $this->pageInstance()->findOrFail($id);

        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titel' => '',
            'meta_titel' => '',
            'meta_beschrijving' => '',
            'meta_titel_twitter' => '',
            'meta_beschrijving_twitter' => '',
            'meta_titel_open_graph' => '',
            'meta_beschrijving_open_graph' => '',
            'nofollow' => '',
            'noindex' => '',
        ]);

        $slug = $this->pageInstance()->findOrFail($id)->slug;

        $array = [
            'slug' => $slug,
            'meta_titel' => $request->meta_titel,
            'meta_beschrijving' => $request->meta_beschrijving,
            'meta_titel_twitter' => $request->meta_titel_twitter,
            'meta_beschrijving_twitter' => $request->meta_beschrijving_twitter,
            'meta_titel_open_graph' => $request->meta_titel_open_graph,
            'meta_beschrijving_open_graph' => $request->meta_beschrijving_open_graph,
            'nofollow' => isset($request->nofollow) ? 1 : 0,
            'noindex' => isset($request->noindex) ? 1 : 0,
            'in_menu' => isset($request->in_menu) ? 1 : 0,
            'in_sitemap' => isset($request->in_sitemap) ? 1 : 0,
        ];

        $twitterImg = uploadImage($request, 'meta_image_twitter', 'image/seo');
        if (!empty($twitterImg)){
            $array = array_merge($array, [
                'meta_image_twitter' => $twitterImg
            ]);
        }

        $ogImg = uploadImage($request, 'meta_image_open_graph', 'image/seo');
        if (!empty($ogImg)){
            $array = array_merge($array, [
                'meta_image_open_graph' => $ogImg,
            ]);
        }

        \App\Page::updateOrCreate(
            ['slug' => $slug],
            $array
        );

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|regex:/^[A-Za-z0-9_-]+$/',
            'titel' => '',
            'meta_titel' => '',
            'meta_beschrijving' => '',
            'meta_titel_twitter' => '',
            'meta_beschrijving_twitter' => '',
            'meta_titel_open_graph' => '',
            'meta_beschrijving_open_graph' => '',
            'nofollow' => '',
            'noindex' => '',
        ], [
            'slug.regex' => 'Geen geldig formaat gebruik (A-Z) (a-z) (0-9) (_ -) voorbeeld: voorbeeld123-website_link'
        ]);

        $slug = '/'.$request->slug;

        $array = [
            'slug' => $slug,
            'meta_titel' => $request->meta_titel,
            'meta_beschrijving' => $request->meta_beschrijving,
            'meta_titel_twitter' => $request->meta_titel_twitter,
            'meta_beschrijving_twitter' => $request->meta_beschrijving_twitter,
            'meta_titel_open_graph' => $request->meta_titel_open_graph,
            'meta_beschrijving_open_graph' => $request->meta_beschrijving_open_graph,
            'nofollow' => isset($request->nofollow) ? 1 : 0,
            'noindex' => isset($request->noindex) ? 1 : 0,
        ];

        $twitterImg = uploadImage($request, 'meta_image_twitter', 'image/seo');
        if (!empty($twitterImg)){
            $array = array_merge($array, [
                'meta_image_twitter' => $twitterImg
            ]);
        }

        $ogImg = uploadImage($request, 'meta_image_open_graph', 'image/seo');
        if (!empty($ogImg)){
            $array = array_merge($array, [
                'meta_image_open_graph' => $ogImg,
            ]);
        }

        $page = \App\Page::updateOrCreate(
            ['slug' => $slug],
            $array
        );

        return redirect()->route('admin.page.edit', $page->id);
    }

    public function destroy(Request $request, $id)
    {
        $page = $this->pageInstance()->findOrFail($id);

        $page->delete();

        return redirect()->route('admin.page.index');
    }
}
