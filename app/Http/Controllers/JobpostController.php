<?php

namespace App\Http\Controllers;

use App\jobpost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user= User::find(Auth::user()->id);  
            $jobpost=DB::table('users')
                         ->join('jobposts', function ($join) {
                          $join->on('users.id', '=', 'jobposts.user_id');
                        })->get();
            
            $jobpost=json_decode($jobpost,true);


            $jobComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('jobposts', 'jobposts.jobpost_id', '=', 'comments.commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();
            $job_applicants=DB::table('applicants')
            ->join('users', 'users.id', '=', 'applicants.user_id')
            ->join('jobposts', 'jobposts.jobpost_id', '=', 'applicants.jobpost_id')
            ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','applicants.created_at','applicants.user_id')
            ->orderBy('jobposts.created_at','desc')
            ->get();

           

            $applicants=DB::table('applicants')
            ->orderBy('created_at','desc')
            ->get();
            
            
            
        return view('jobpost.jobpost_index',['user'=>$user,'jobpost'=>$jobpost,
        'jobComment'=>$jobComment,'job_applicants'=>$job_applicants,'applicants'=>$applicants]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function search(Request $request)
    {
            $q = Input::get ( 'q' );

            $profession = Jobpost::where('profession','LIKE','%'.$q.'%')->get();

            if(count($profession) > 0)
                return view('search')->withDetails($profession)->withQuery ( $q );
            else return view ('search')->withMessage('No Details found. Try to search again !');
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=time();

        if(Auth::check()){
            $jobpost = jobpost::create([
                'position' => $request->input('position'),
                'profession' => $request->input('profession'),
                'vacancy_number' => $request->input('vacancy_number'), 
                'circular' => $request->input('circular'),
                'company_details' => $request->input('company_details'),
                'job_details' => $request->input('job_details'),
                'location' => $request->input('location'),
                'jobpost_id'=>$id,
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
        $jobpostDelete = Jobpost::find( $jobpost->jobpost_id );
       
         if($jobpostDelete->delete())
        {
            return back()->with('success','Hiring post deleted successfully.');
        }

        return back()->withInput()->with('errors', 'Post could not be deleted.');
    }
}
