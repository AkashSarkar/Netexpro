<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jobpost;
use App\AvailableForJob;
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
        
        
        $profession = session('choice');
        $location = session('location');
        $formdate = session('formdate');
        $todate = session('todate');
       // dd($profession,$location,$formdate,$todate);

        if($profession!=null && $location!=null && $formdate!=null && $todate!=null)
        {
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
            ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();

         //   dd($jobpost);
        }

        else if($profession!=null && $location!=null)
        {
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
            ])
            ->get();
            dd($jobpost);
        }
        else if($profession!=null && $formdate!=null && $todate!=null)
        {
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.profession', '=', $profession)
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();

            dd($jobpost);

        }
        else if($location!=null && $formdate!=null && $todate!=null)
        {           
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.location', '=', $location)
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();
            dd($jobpost);
        }
       else if($profession!=null) 
        {     
            $jobpost=DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.profession','=',$profession)
            ->get();
            dd($jobpost);
        }
        else if($location!=null) 
        {     
            $jobpost=DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.location','=',$location)
            ->get();
            dd($jobpost);
        }
        else if($formdate!=null&&$todate!=null)
        {

            $jobpost=DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();
            dd($jobpost);
        }
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

        $profession=$request->input('choice');
        Session::put('choice', $profession);

        $location= $request->input('location');
        Session::put('location', $location);

        $formdate=$request->input('fromdate');
       // dd($formdate);
        Session::put('formdate', $formdate);
        
        $todate=$request->input('todate');
        Session::put('todate', $todate);



        if($profession!="0" && $location!="0" && $formdate!=null && $todate!=null)
        {
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
            ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();
        }

        else if($profession!="0" && $location!="0")
        {
            session()->forget('formdate');
            session()->forget('todate');

            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
            ])
            ->get();
        }
        else if($profession!="0" && $formdate!=null && $todate!=null)
        {
            session()->forget('location');
            
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.profession', '=', $profession)
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();

        }
        else if($location!="0" && $formdate!=null && $todate!=null)
        {
            session()->forget('choice');
            
            $jobpost = DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.location', '=', $location)
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->get();

        }
        else if($profession!="0")
        {
            session()->forget('location');
            session()->forget('formdate');
            session()->forget('todate');

            $jobpost=DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.profession','=',$profession)
            ->get();
         }
         else if ($location!="0") {

            session()->forget('choice');
            session()->forget('formdate');
            session()->forget('todate');

             $jobpost=DB::table('users')
            ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
            ->where('jobposts.location','=',$location)
            ->get();
         }
         else if($formdate!=null&&$todate!=null)
         {

             session()->forget('choice');
             session()->forget('location');

             $jobpost=DB::table('users')
             ->join('jobposts', 'jobposts.user_id', '=', 'users.id')
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->get();

             //dd($jobpost);
         }
         
         
     


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
