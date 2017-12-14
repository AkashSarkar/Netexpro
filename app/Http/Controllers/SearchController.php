<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jobpost;
use App\User;
use App\Interest;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

    
        $user= User::find(Auth::user()->id);  
        $r = session('choice');
        
       // $profession = Jobpost::where('profession','LIKE','%'.$r.'%')->get();
              
        $jobpost=DB::table('users')
        ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
        ->where('jobposts.profession','=',$r)
        ->get();
        // dd($jobpost);


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
         

         return view('search',['user'=>$user,'jobpost'=>$jobpost,
         'jobComment'=>$jobComment,'job_applicants'=>$job_applicants,'applicants'=>$applicants]);


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
    }

    public function search(Request $request)
    {
        //
        $user= User::find(Auth::user()->id);  
        $r=$request->input('choice');
        Session::put('choice', $r);
      

        $jobpost=DB::table('users')
        ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
        ->where('jobposts.profession','=',$r)
        ->get();
     


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
         

         return view('search',['user'=>$user,'jobpost'=>$jobpost,
         'jobComment'=>$jobComment,'job_applicants'=>$job_applicants,'applicants'=>$applicants]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}