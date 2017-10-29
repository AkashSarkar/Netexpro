<?php

namespace App\Http\Controllers;

use App\User;
use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('interests.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         //$interest= Interest::find(Auth::user()->id);
       //return view('profile.profile_index',['interest'=>$interest]);
          
        //return view( 'interests.create',['user'=>Auth::user()->id]);
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
            $interest = Interest::create([
                'profession' => $request['profession'],
                'industry' =>  $request['industry'],
                'interest_priority' =>  $request['interest_priority'],
                'user_id'=>Auth::user()->id
            ]);
            
            if( $interest){
                return redirect()->route('users.index');
            }
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function edit(Interest $interest)
    {
        //
         $interest= Interest::find(Auth::user()->id);

       //return view('profile.profile_edit', ['user'=> $user]);
       return view('interests.interests_edit', ['interest'=>$interest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interest $interest)
    {
        //

         $interestsUpdate = Interest::where('id',Auth::user()->id)->update([
            'profession' => $request->input('profession'),
             'industry' => $request->input('industry'),
             
             
            ]);

        if($interestsUpdate){ 
            
            return redirect()->route('profile.index', ['user'=>Auth::user()->id])->with('success','Profile Updated Successfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interest  $interest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        //
    }
}
