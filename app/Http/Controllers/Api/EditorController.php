<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EditorController extends Controller
{
    public function imageEditor (Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|mimes:jpeg,png|max:1014',
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                \App\Image::updateOrCreate(
                    ['key_name' => $request->key_name],
                    [
                        'path' => uploadImage($request, 'image', 'image/global'),
                        'extension' => $request->image->extension(),
                        'original' => $validated['image'],
                        'alt' => $request->alt_text
                    ]
                );
                Session::flash('success', "Success!");

                return redirect()->to(url()->previous() . '#'.$request->key_name);
            }
        }
        return redirect()->back();
    }

    public function pageEditor(Request $request)
    {
        $request->validate([
        ]);

        $slug = str_replace(url('/'), '', url()->previous());
        $slug = $slug == '' ? '/': $slug;

        \App\Page::updateOrCreate(
            ['slug' => $slug],
            [
                'slug' => $slug,
                'titel' => $request->titel,
                'in_sitemap' => isset($request->in_sitemap) ? 1 : 0,
                'in_menu' => isset($request->in_menu) ? 1 : 0,
            ]
        );
        return redirect()->back();
    }

    public function styleEditor(Request $request)
    {
        $request->validate([]);

        $slug = str_replace(url('/'), '', url()->previous());
        $slug = $slug == '' ? '/': $slug;

        $pageModel = new Page;
        $page = $pageModel->firstOrNew(['slug' => $slug]);

        $path = public_path();


        $test =\File::put($path.'\css\editor\\'.$page->id.'.css', $request->page_styling);
        \File::put($path.'\css\editor\global.css', $request->global_styling);
//        dd($path, $test);

        return redirect()->back();
    }

    public function seoEditor(Request $request)
    {
        $request->validate([
        ]);

        $slug = str_replace(url('/'), '', url()->previous());
        $slug = $slug == '' ? '/': $slug;

        $array = [
            'slug' => $slug,
            'meta_titel' => $request->meta_titel,
            'meta_beschrijving' => $request->meta_beschrijving,
            'meta_titel_twitter' => $request->meta_titel_twitter,
            'meta_beschrijving_twitter' => $request->meta_beschrijving_twitter,
            'meta_titel_open_graph' => $request->meta_titel_open_graph,
            'meta_beschrijving_open_graph' => $request->meta_beschrijving_open_graph,
            'options' => $request->options,
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

        \App\Page::updateOrCreate(
            ['slug' => $slug],
            $array
        );
        return redirect()->back();
    }

    public function siteSettings(Request $request)
    {
        foreach($request->except('_token') as $key => $value){
            $array = [
                'setting' => $key,
            ];

            if ($key == 'logo' || $key == 'algemene_voorwaarden' || $key == 'cookie_beleid' || $key == 'privacy_statement'){
                $file = $key == 'logo'
                    ? uploadImage($request, $key, 'file', 'jpeg,png')
                    : uploadImage($request, $key, 'file', 'pdf');
                if (!empty($file)){
                    $array = array_merge($array, [
                        'field_value' => $file,
                    ]);
                }
            }else{
                $array = array_merge($array, [
                    'field_value' => $value,
                ]);
            }

            \App\Settings::updateOrCreate(
                ['setting' => $key],
                $array
            );
        }

        return redirect()->back();
    }

    public function textEditor(Request $request)
    {
        \App\Text::updateOrCreate(
            ['key_name' => $request->key_name],
            [
                'mentions' => $request->mentions,
                'text_type' => 'richtext',
                'text' => $request->editor
            ]
        );
        return redirect()->to(url()->previous() . '#editor-'.$request->key_name);
    }
}
