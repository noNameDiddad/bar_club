<?php

namespace App\Http\Controllers;

use App\Models\FirstName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FirstNameController extends Controller
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
            'first_name' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back();
        }

        $first_name = new FirstName();
        $first_name->first_name = $request->first_name;

        $first_name->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FirstName  $firstName
     * @return \Illuminate\Http\Response
     */
    public function show(FirstName $firstName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FirstName  $firstName
     * @return \Illuminate\Http\Response
     */
    public function edit(FirstName $firstName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FirstName  $firstName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirstName $firstName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FirstName  $firstName
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirstName $firstname)
    {
        session()->put('changed','1');
        if($firstname->delete()) {
            return redirect()->back();
        }
    }
}
