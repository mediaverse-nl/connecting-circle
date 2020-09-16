<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    protected $jobs;

    public function __construct(Jobs $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->jobs->get();

        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $job = $this->jobs;

        $job->titel = $request->titel;
        $job->plaats = $request->plaats;
        $job->salaris = $request->salaris;
        $job->korte_beschrijving = $request->korte_beschrijving;
        $job->vacature = $request->vacature;
        $job->status = $request->status;
        $job->live = $request->live == 'on' ? 1 : 0;
        $job->employer_id = $request->employer_id;
        $job->specialty_id = $request->specialty_id;
        $job->save();

        return redirect()->route('admin.jobs.edit', $job->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = $this->jobs->findOrFail($id);

        return view('admin.job.edit', compact('job'));
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
        $job = $this->jobs->findOrFail($id);

        $job->titel = $request->titel;
        $job->plaats = $request->plaats;
        $job->salaris = $request->salaris;
        $job->korte_beschrijving = $request->korte_beschrijving;
        $job->vacature = $request->vacature;
        $job->status = $request->status;
        $job->live = $request->live == 'on' ? 1 : 0;
        $job->employer_id = $request->employer_id;
        $job->specialty_id = $request->specialty_id;
        $job->save();

        return redirect()->route('admin.jobs.edit', $job->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = $this->jobs->findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index');
    }
}
