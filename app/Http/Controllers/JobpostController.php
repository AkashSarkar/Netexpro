<?php

namespace App\Http\Controllers;

use App\jobpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobpostController extends Controller
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
            $jobpost = jobpost::create([
                'position' => $request->input('position'),
                'profession' => $request->input('profession'),
                'vacancy_number' => $request->input('vacancy_number'), 
                'circular' => $request->input('circular'),
                'company_details' => $request->input('company_details'),
                'job_details' => $request->input('job_details'),
                'location' => $request->input('location'),
                
                'user_id' => Auth::user()->id
            ]);


            if($jobpost){
                return back()->with('success' , 'Successfully posted for hiring');
            }

        }
        
            return back()->withInput()->with('errors', 'Error creating new hiring post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function show(jobpost $jobpost)
    {
        //
        if( Auth::check() )
         {
            //dump is used to see the id of the authenticated user that is currently logged in
           // dump(Auth::user()->id);
        //basically we are saying here is find the company where the user who created it is the same user currently logged in 
        //use get() to get the companies of that specific id 
            
           // $post = Post::where('user_id', Auth::user()->id)->get();
           
        
       
        }
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function edit(jobpost $jobpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jobpost $jobpost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobpost $jobpost)
    {
        $jobpostDelete = Jobpost::find( $jobpost->id );
       
         if($jobpostDelete->delete())
        {
            return back()->with('success','project deleted successfully.');
        }

        return back()->withInput()->with('errors', 'project could not be deleted.');
    }
}
