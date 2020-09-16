<?php

namespace App\Http\Controllers\Admin;

use App\Employer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    protected $employer;

    public function __construct(Employer $employer)
    {
        $this->employer = $employer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = $this->employer->get();

        return view('admin.employer.index', compact('employers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = $this->employer->findOrFail($id);

        return view('admin.employer.edit', compact('employer'));
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
//        $array = [
//            'ads' => $request->data,
//        ];

//        dd(json_encode($request->data));
        $request->validate([
            'bedrijfsnaam' => 'required',
            'email' => 'required|email',
            'kvk_nummer' => 'required',
        ]);

        $employers = $this->employer->findOrFail($id);

        $employers->bedrijfsnaam = $request->bedrijfsnaam;
        $employers->email = $request->email;
        $employers->kvk_nummer = $request->kvk_nummer;
        $employers->data = $request->data;
        $employers->save();

        if (isset($request->notities))
            auth()->user()->comment($employers, $request->notities);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $employers = $this->employer->findOrFail($id);

        $employers->delete();

        return redirect()->route('admin.employer.index');
    }
}
