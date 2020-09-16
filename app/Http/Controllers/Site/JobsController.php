<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Jobs;
use App\Traits\EncryptFilter;
use App\Traits\SeoTags;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class JobsController extends Controller
{
    use SeoTags, EncryptFilter;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->addPageSeo();

        $page = $this->getCurrentPageEntry();
        $filter = $this->encryptFilter(request()->query, route('site.jobs.index'));

        $vacatures = \App\Jobs::with('specialty')->whereNotNull('specialty_id');
        $vacaturesBase = $vacatures->get();
        $vacatures = $vacatures->where(function($sub) use ($filter){
            if (isset($filter['trefwoorden'])) {
                $sub->where('titel', 'like', '%'.$filter['trefwoorden'].'%')
                    ->orwhere('korte_beschrijving', 'like', '%'.$filter['trefwoorden'].'%')
                    ->orwhere('vacature', 'like', '%'.$filter['trefwoorden'].'%');


            }
            if (isset($filter['vakgebied'])) {
                $iv = 0;
                foreach ($filter['vakgebied'] as $regio){
                    if ($iv == 0 ){
                        $sub->where('specialty_id', '=', $regio);
                    }else{
                        $sub->orwhere('specialty_id', '=', $regio);
                    }
                    $iv++;
                }
            }
            if (isset($filter['regio'])) {
                $ir = 0;
                foreach ($filter['regio'] as $regio){
                    if ($ir == 0 ){
                        $sub->where('plaats', '=', $regio);
                    }else{
                        $sub->orwhere('plaats', '=', $regio);
                    }
                    $ir++;
                }
            }
        })->get();

        return view('site.jobs', compact('page', 'vacatures', 'vacaturesBase', 'filter'));
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
}
