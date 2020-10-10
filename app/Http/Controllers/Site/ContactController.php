<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactStoreRequest;
use App\Mail\AdminContactRequest;
use App\Mail\ContactRequest;
use App\Traits\SeoTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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

        return view('site.contact', compact('page'));
    }

    public function store(ContactStoreRequest $request)
    {
        Mail::to($request->email)
            ->send(new ContactRequest($request->except(['_token', 'g-recaptcha-response'])));

        Mail::to('recruitment@connectingcircle.nl')
            ->send(new ContactRequest($request->except(['_token', 'g-recaptcha-response'])));

        session()->flash('successModel', 'success');

        return redirect()->route('site.contact.index');
    }
}
