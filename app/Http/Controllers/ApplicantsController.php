<?php

namespace App\Http\Controllers;

use App\Applicants;
use Illuminate\Http\Request;

use Illuminate\Support\facades\Auth;

class ApplicantsController extends Controller
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
        //

        if(Auth::check()){
            
            $applicant = Applicants::create([
                'user_id'=>Auth::user()->id,
                'jobpost_id'=>$request->input('jobpost_id')
                
              
            ]);
           }

        if($applicant){
           return back()->with('success' , 'Apply For Job successfully');
               }
       
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function show(Applicants $applicants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicants $applicants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicants $applicants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicants  $applicants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicants $applicants)
    {
        //
    }
}
