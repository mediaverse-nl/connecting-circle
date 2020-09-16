<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    protected $specialty;

    public function __construct(Specialty $specialty)
    {
        $this->specialty = $specialty;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = $this->specialty->get();

        return view('admin.specialty.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specialty = $this->specialty;
        $specialty->naam = $request->naam;
        $specialty->icon = $request->icon;
        $specialty->save();

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialty = $this->specialty->findOrFail($id);

        return view('admin.specialty.edit', compact('specialty'));
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
        $specialty = $this->specialty->findOrFail($id);
        $specialty->naam = $request->name;
        $specialty->icon = $request->icon;
        $specialty->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialty = $this->specialty->findOrFail($id);
        $specialty->delete();

        return redirect()->route('admin.specialty.index');
    }
}
