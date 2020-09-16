<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\Experience;
use App\Http\Controllers\Controller;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    protected $candidates;

    public function __construct(Candidate $candidate)
    {
        $this->candidates = $candidate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = $this->candidates->get();

        return view('admin.candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = $this->candidates->findOrFail($id);

        return view('admin.candidate.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
//            'status' => 'required'
        ]);

        $candidate = $this->candidates->findOrFail($id);
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
        $candidate->inleiding = $request->inleiding;
        $candidate->opmerking_voor_werkgever = $request->opmerking_voor_werkgever;
        $candidate->rijbewijs = $request->rijbewijs;
        $candidate->geboorteplaats = $request->geboorteplaats;
        $candidate->geslacht = $request->geslacht;
        $candidate->geboortedatum = Carbon::parse($request->geboortedatum);
        $candidate->save();

        if (isset($request->profiel_foto)){
            $profiel_foto = uploadImage($request, 'profiel_foto', 'storage/candidate/'.$id.'/profiel', 'jpeg,png');
            $candidate->update(['profiel_foto' => $profiel_foto]);
        }

        $this->insertMultipleSections($request->opleidingen, $candidate, new \App\Educations(), 'educations', [
            'schooling',
            'van',
            'tot',
            'school_en_plaats',
        ]);

        $this->insertMultipleSections($request->werkervaring, $candidate, new \App\Experience(), 'experiences', [
            'functie',
            'tot',
            'van',
            'bedrijf',
            'inleiding',
        ]);

        $this->insertMultipleSections($request->talen, $candidate, new \App\Language(), 'languages', [
            'taal',
            'ervaring',
        ]);

        $this->insertMultipleSections($request->vaardigheden, $candidate, new \App\Skill(), 'skills', [
            'vaardigheid',
            'ervaring',
        ]);

        $this->insertMultipleSections($request->referenties, $candidate, new \App\References(), 'references', [
            'contactpersoon',
            'bedrijf',
            'telefoonnummer',
            'email',
        ]);

        $this->insertMultipleSections($request->interesses, $candidate, new \App\Interests(), 'interests', [
            'interesse',
        ]);

        if (!empty($request->notities)){
            auth()->user()->comment($candidate, $request->notities);
        }

        return redirect()->back();
    }

    function insertMultipleSections($request, $candidate, $model, $deleteModelName, $arrayInput)
    {
        if (!empty($request)){
            $candidate->{$deleteModelName}()->delete();
            $arr = [];
            foreach ($request as $value){
                $inputArr = [];
                foreach ($arrayInput as $input) {
                    $inputArr = array_merge($inputArr, [$input =>$value[$input]]);
                }
                $arr[] = array_merge($inputArr, [
                    'candidate_id' => $candidate->id,
                ]);
            }
            $model->insert($arr);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = $this->candidates->findOrFail($id);

        $candidate->delete();

        return redirect()->route('admin.candidate.index');
    }
}
