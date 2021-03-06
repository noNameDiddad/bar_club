<?php

namespace App\Http\Controllers;

use App\Models\LastName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LastNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        session()->put('changed','1');
        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back();
        }

        $last_name = new LastName();
        $last_name->last_name = $request->last_name;

        $last_name->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LastName  $lastName
     * @return \Illuminate\Http\Response
     */
    public function show(LastName $lastName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LastName  $lastName
     * @return \Illuminate\Http\Response
     */
    public function edit(LastName $lastName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LastName  $lastName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LastName $lastName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LastName  $lastName
     * @return \Illuminate\Http\Response
     */
    public function destroy(LastName $lastname)
    {
        session()->put('changed','1');
        if($lastname->delete()) {
            return redirect()->back();
        }
    }
}
