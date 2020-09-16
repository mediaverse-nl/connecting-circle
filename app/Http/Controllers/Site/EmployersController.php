<?php

namespace App\Http\Controllers\Site;

use App\Employer;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerStoreRequest;
use App\Http\Requests\Site\ContactStoreRequest;
use App\Traits\SeoTags;
use Illuminate\Http\Request;

class EmployersController extends Controller
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

        return view('site.employers', compact('page'));
    }

    /**
     * @param EmployerStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployerStoreRequest $request)
    {
        $employer = new Employer;

        $employer->bedrijfsnaam = $request->bedrijfsnaam;
        $employer->email = $request->email;
        $employer->kvk_nummer = $request->kvk_nummer;

        $employer->save();

//        Mail::to($request->email)
//            ->send(new ContactRequest($request->except(['_token', 'g-recaptcha-response'])));
//
//        Mail::to(env('MAIL_ADMIN'))
//            ->send(new AdminContactRequest($request->except(['_token', 'g-recaptcha-response'])));

        session()->flash('successModel', 'success');

        return redirect()->route('site.employers.index');
    }
}
