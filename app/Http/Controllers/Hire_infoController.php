<?php

namespace App\Http\Controllers;
use Notification;
use Illuminate\Http\Request;
use App\Hire_info;
use Illuminate\Support\facades\Auth;
use App\Notifications\jobOffers;
use DB;
use App\User;

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
                ->select('firstname','lastname','p_pic','position','profession','company_details','job_details',
                'jobposts.location','jobpost_id')
                ->join('jobposts','users.id','=','jobposts.user_id')
                ->where('jobpost_id','=',$hire_info->hire_post_id)->get();
                //dd($employer);
                $employee=User::where('id','=',$hire_info->employee_id)->first();
                //$employee=json_decode($employee,true);
                //dd($employee);
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
