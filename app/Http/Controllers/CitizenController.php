<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizens = Citizen::all();
        return view('auth.login', ['citizens', $citizens]);
    }

    public function validateRequest(Request $request)
    {
        return $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required|integer',
            'ward_id' => 'required'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        $citizen = new Citizen();
        $citizen->fullname = $data['firstname'] . " " .  $data['lastname'];
        $citizen->gender = $data['gender'];
        $citizen->address = $data['address'];
        $citizen->phone = $data['phone'];
        $citizen->ward_id = $data['ward_id'];
        if ($citizen->save()) {
            session()->flash('message', 'Citizen Successfully Saved');
            return back()->withErrors('Citizen not Saved');
        }
    }

    public function search()
    {
        return view('search');
    }

    public function searchCitizens(Request $request)
    {
        $citizens = Citizen::where('id', $request['search'])->orWhere('fullname', 'like', "%{$request['search']}%")->get();
        return view('search')->with('citizens', $citizens);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show(Citizen $citizen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Citizen $citizen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        //
    }
}
