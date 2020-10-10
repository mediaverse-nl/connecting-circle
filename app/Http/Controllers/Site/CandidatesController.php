<?php

namespace App\Http\Controllers\Site;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateStoreRequest;
use App\Mail\AdminCandidateRequest;
use App\Mail\CandidateRequest;
use App\Mail\ContactRequest;
use App\Traits\SeoTags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CandidatesController extends Controller
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

        return view('site.candidates', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateStoreRequest $request)
    {
        $candidate = new Candidate;

        $candidate->voorletters = $request->voorletters;
        $candidate->voornaam = $request->voornaam;
        $candidate->achternaam = $request->achternaam;
        $candidate->voorvoegsel = $request->voorvoegsel;
        $candidate->adres = $request->adres;
        $candidate->postcode = $request->postcode;
        $candidate->plaats = $request->plaats;
        $candidate->telefoon_prive = $request->telefoon_prive;
        $candidate->telefoon_mobiel = $request->telefoon_mobiel;
        $candidate->email = $request->email;
        $candidate->sociaal_networkprofiel = $request->sociaal_networkprofiel;
        $candidate->geboortedatum = Carbon::parse($request->geboortedatum);
        $candidate->save();

        $uploadCv = uploadImage($request, 'upload_cv', 'storage/files/shares/candidate/'.$candidate->id.'/cv', 'pdf');
        $uploadMoti = uploadImage($request, 'upload_motivatiebrief', 'storage/files/shares/candidate/'.$candidate->id.'/motivatiebrief', 'pdf');

        $candidate->update(['upload_cv' => $uploadCv]);
        $candidate->update(['upload_motivatiebrief' => $uploadMoti]);

        session()->flash('successModel', 'success');

        //todo send mail with referentienummer
        Mail::to($request->email)
            ->send(new CandidateRequest($request->except(['_token', 'g-recaptcha-response'])));

        Mail::to('recruitment@connectingcircle.nl')
            ->send(new AdminCandidateRequest($request->except(['_token', 'g-recaptcha-response'])));

        return redirect()->back();
    }
}
