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
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
               ])
             ->whereBetween('jobposts.created_at', [$formdate, $todate]) 
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
             ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');

         //   dd($jobpost);
        }

        else if($profession!=null && $location!=null)
        {
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
                          ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
                          'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
               ])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
           ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
           // dd($jobpost);
        }
        else if($profession!=null && $formdate!=null && $todate!=null)
        {
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->where('jobposts.profession','=',$profession)
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
           ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');

           // dd($jobpost);

        }
        else if($location!=null && $formdate!=null && $todate!=null)
        {           
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->where('jobposts.location','=',$location)
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
           ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
           // dd($jobpost);
        }
       else if($profession!=null) 
        {     
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
                          ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
                          'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->where('jobposts.profession','=',$profession)
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
           ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
          //  dd($jobpost);
        }
        else if($location!=null) 
        {     
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->where('jobposts.location','=',$location)
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
           ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
            //dd($jobpost);
        }
        else if($formdate!=null&&$todate!=null)
        {

            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
                          ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
                          'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
           ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where('jobposts.user_id', '=', Auth::user()->id)
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
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

        $u=Auth::user()->id;
        $qualified_candidate=DB::select('SELECT * FROM available_for_jobs JOIN jobposts 
        WHERE available_for_jobs.profession = jobposts.profession 
        AND available_for_jobs.position = jobposts.position 
        AND available_for_jobs.location = jobposts.location
        AND available_for_jobs.user_id=:u
        ORDER BY jobposts.created_at desc' ,
        ['u'=>$u]);
        
        $is_hired=DB::select('SELECT * FROM hire_info');
       return view('search',['user'=>$user,'jobpost'=>$jobpost,
       'jobComment'=>$jobComment,'job_applicants'=>$job_applicants,'applicants'=>$applicants,'qualified_candidate'=>$qualified_candidate,'is_hired'=>$is_hired]);

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
        Session::put('formdate', $formdate);
        
        $todate=$request->input('todate');
        Session::put('todate', $todate);
       


        if($profession!="0"&& $location!="0" && $formdate!=null && $todate!=null)
        {
            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')

             ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
               ])
             ->whereBetween('jobposts.created_at', [$formdate, $todate]) 
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
             ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate]) 
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');

     
        }

        else if($profession!="0" && $location!="0")
        {
            session()->forget('formdate');
            session()->forget('todate');

            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')

             ->where([
                ['jobposts.profession', '=', $profession],
                ['jobposts.location', '=', $location]
               ])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
             ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
           
        }
        else if($profession!="0" && $formdate!=null && $todate!=null)
        {
            session()->forget('location');

            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')

             ->where('jobposts.profession','=',$profession)
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
             ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.profession', '=', $profession],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');


        }
        else if($location!="0" && $formdate!=null && $todate!=null)
        {  
            session()->forget('choice');

            $jobposts=DB::table('users')
            ->join('jobposts', function ($join) {
             $join->on('users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '!=', Auth::user()->id);
           })
           ->join('interests',function ($join) {
               $join->on('interests.profession', '=', 'jobposts.profession')
               ->where('interests.user_id', '=', Auth::user()->id);
             })
             ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
             ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
             'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')

             ->where('jobposts.location','=',$location)
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->groupBy('jobpost_id')
             ->orderBy('jobposts.created_at','desc')
             ->get();

           $user_job_hire_post=DB::table('users')
           ->join('jobposts','users.id', '=', 'jobposts.user_id')
            ->where([
               ['jobposts.location', '=', $location],
               ['jobposts.user_id', '=', Auth::user()->id]
              ])
            ->whereBetween('jobposts.created_at', [$formdate, $todate])
            ->orderBy('jobposts.created_at','desc')
            ->get();
           
            $jobpost=$jobposts->merge($user_job_hire_post);
            $jobpost=$jobpost->sortByDesc('created_at');
           
        }
        else if($profession!="0")
        {
            session()->forget('location');
            session()->forget('formdate');
            session()->forget('todate');

            $jobposts=DB::table('users')
                         ->join('jobposts', function ($join) {
                          $join->on('users.id', '=', 'jobposts.user_id')
                          ->where('jobposts.user_id', '!=', Auth::user()->id);
                        })
                        ->join('interests',function ($join) {
                            $join->on('interests.profession', '=', 'jobposts.profession')
                            ->where('interests.user_id', '=', Auth::user()->id);
                          })
                          ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
                          ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
                          'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
             
                          ->where('jobposts.profession','=',$profession)
                          ->groupBy('jobpost_id')
                          ->orderBy('jobposts.created_at','desc')
                        ->get();

                        $user_job_hire_post=DB::table('users')
                        ->join('jobposts','users.id', '=', 'jobposts.user_id')
                         ->where([
                            ['jobposts.profession', '=', $profession],
                            ['jobposts.user_id', '=', Auth::user()->id]
                           ])
                         ->orderBy('jobposts.created_at','desc')
                         ->get();
                        
                 $jobpost=$jobposts->merge($user_job_hire_post);
                 $jobpost=$jobpost->sortByDesc('created_at');

                // dd($jobpost);
         }
         else if($location!="0") 
         {  
             
            session()->forget('choice');
            session()->forget('formdate');
            session()->forget('todate');

             $jobposts=DB::table('users')
             ->join('jobposts', function ($join) {
              $join->on('users.id', '=', 'jobposts.user_id')
              ->where('jobposts.user_id', '!=', Auth::user()->id);
            })
            ->join('interests',function ($join) {
                $join->on('interests.profession', '=', 'jobposts.profession')
                ->where('interests.user_id', '=', Auth::user()->id);
              })
              ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
              ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
              'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
 
              ->where('jobposts.location','=',$location)
              ->groupBy('jobpost_id')
              ->orderBy('jobposts.created_at','desc')
            ->get();
 
            $user_job_hire_post=DB::table('users')
            ->join('jobposts','users.id', '=', 'jobposts.user_id')
             ->where([
                ['jobposts.location', '=', $location],
                ['jobposts.user_id', '=', Auth::user()->id]
               ])
             ->orderBy('jobposts.created_at','desc')
             ->get();
            
             $jobpost=$jobposts->merge($user_job_hire_post);
             $jobpost=$jobpost->sortByDesc('created_at');
             //dd($jobpost);
         }
         else if($formdate!=null&&$todate!=null)
         {
            session()->forget('choice');
            session()->forget('location');
 
             $jobposts=DB::table('users')
             ->join('jobposts', function ($join) {
              $join->on('users.id', '=', 'jobposts.user_id')
              ->where('jobposts.user_id', '!=', Auth::user()->id);
            })
            ->join('interests',function ($join) {
                $join->on('interests.profession', '=', 'jobposts.profession')
                ->where('interests.user_id', '=', Auth::user()->id);
              })
              ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
              ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
              'salary_range','jobposts.job_type','jobposts.job_level','jobposts.under_grad','jobposts.post_grad','jobposts.experience','jobposts.industry')
 
              ->whereBetween('jobposts.created_at', [$formdate, $todate])
              ->groupBy('jobpost_id')
              ->orderBy('jobposts.created_at','desc')
              ->get();
 
            $user_job_hire_post=DB::table('users')
            ->join('jobposts','users.id', '=', 'jobposts.user_id')
             ->where('jobposts.user_id', '=', Auth::user()->id)
             ->whereBetween('jobposts.created_at', [$formdate, $todate])
             ->orderBy('jobposts.created_at','desc')
             ->get();
            
             $jobpost=$jobposts->merge($user_job_hire_post);
             $jobpost=$jobpost->sortByDesc('created_at');
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

         $u=Auth::user()->id;
         $qualified_candidate=DB::select('SELECT * FROM available_for_jobs JOIN jobposts 
         WHERE available_for_jobs.profession = jobposts.profession 
         AND available_for_jobs.position = jobposts.position 
         AND available_for_jobs.location = jobposts.location
         AND available_for_jobs.user_id=:u
         ORDER BY jobposts.created_at desc' ,
         ['u'=>$u]);

         $is_hired=DB::select('SELECT * FROM hire_info');

        return view('search',['user'=>$user,'jobpost'=>$jobpost,
        'jobComment'=>$jobComment,'job_applicants'=>$job_applicants,'applicants'=>$applicants,'qualified_candidate'=>$qualified_candidate,'is_hired'=>$is_hired]);
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
