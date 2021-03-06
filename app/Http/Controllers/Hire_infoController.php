<?php

namespace App\Http\Controllers;
use Notification;
use Illuminate\Http\Request;
use App\Hire_info;
use Illuminate\Support\facades\Auth;
use App\Notifications\jobOffers;
use App\Notifications\invitationAccepted;
use DB;
use App\User;
use App\jobpost;
use Session;
class Hire_infoController extends Controller
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
            $hire_info = Hire_info::create([
                'employer_id' =>$request->input('employer'),
                'employee_id'=>$request->input('employee'),
                'hire_post_id'=>$request->input('hire_post_id')
            ]);

            if($hire_info){
                $employer=DB::table("users")
                ->select('id','firstname','lastname','p_pic','position','profession','company_details','job_details',
                'jobposts.location','jobpost_id')
                ->join('jobposts','users.id','=','jobposts.user_id')
                ->where('jobpost_id','=',$hire_info->hire_post_id)->get();
                
                $employee=User::where('id','=',$hire_info->employee_id)->first();
                //$employee=json_decode($employee,true);
                
                Notification::send($employee, new jobOffers($employer));
                //$employee->notify(new jobOffers($employer));
                return back()->with('success' , 'Hired successfully');
            }
            
             return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id,$employer_id,$notification_type,$notify_id)
    {
        //dd($employer_id);
        auth()->user()->unreadNotifications->where('id', $notify_id)->markAsRead();

        $jobpost=DB::table('users')
        ->join('jobposts','users.id', '=', 'jobposts.user_id')
       ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','jobposts.user_id','jobposts.location','jobposts.profession'
         ,'jobposts.position','jobposts.vacancy_number','jobposts.circular','jobposts.company_details','jobposts.created_at','jobposts.jobpost_id','jobposts.job_details',
         'salary_range')
         ->where([
             ['jobpost_id','=',$post_id],
             ['users.id','=',$employer_id]
         ])
         ->groupBy('jobpost_id')
         ->orderBy('jobposts.created_at','desc')
         ->get();

         $job_applicants=DB::table('applicants')
            ->join('users', 'users.id', '=', 'applicants.user_id')
            ->join('jobposts', 'jobposts.jobpost_id', '=', 'applicants.jobpost_id')
            ->select('users.firstname','users.lastname','users.p_pic','jobposts.jobpost_id','applicants.created_at','applicants.user_id')
            ->orderBy('jobposts.created_at','desc')
            ->get();
        $is_hired=DB::select('SELECT * FROM hire_info');
        
        //dd($jobpost);
        return view('template.notification_jobpost',['jobposts'=>$jobpost,'type'=>$notification_type,
        'job_applicants'=>$job_applicants,'is_hired'=>$is_hired]);
        
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
        //dd($id);
        
        $employer_id=$request->employer;
        $employee_id=Auth::user()->id;
        $notify_id=$request->notify_id;
        auth()->user()->unreadNotifications->where('id', $notify_id)->markAsRead();
        //dd($employee_id);
       $accept=Hire_info::where([
            ['employer_id','=', $employer_id],
            ['hire_post_id','=',$id]
        ])->update(['is_invitaion_accepted'=>1]);
        if($accept){
            $employer=User::where('id','=', $employer_id)->first();
            
            $notify_value=DB::table("users")
            ->select('id','firstname','lastname','p_pic','position','profession','company_details','job_details',
            'jobposts.location','jobpost_id')
            ->join('jobposts','users.id','=','jobposts.user_id')
            ->where('jobpost_id','=',$id)->get();


            $employee=DB::table("users")
            ->select('id','firstname','lastname','p_pic')
            ->where('id','=',$employee_id)->first();
             $is_hired=DB::select('SELECT * FROM hire_info');
            //dd($notify_value);
            //Session::put('is_hire',$is_hired);
            //dd(Session::get('is_hire'));
            
           
            Notification::send($employer, new invitationAccepted($employee, $notify_value));


            return back()->with('success', 'Invitation accepted successfully');
        }
        
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
