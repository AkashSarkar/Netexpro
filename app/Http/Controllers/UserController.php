<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::find(Auth::user()->id);
       return view('users.edit',['user'=>$user] );
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

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,User $user)
    {
        //
        //save data

        if( Auth::check() ){
            $userUpdate=User::find($user->id)
            ->update([
                'phone_no'=>$request->input('phone_no'),
                'gender'=>$request->input('gender'),
                'nid'=>$request->input('nid'),
                'bank_ac'=>$request->input('bank_ac'),
                'location'=>$request->input('location'),
                'dob'=>$request->input('dob'),
                'interest'=>$request->input('interest'),
                
            ]);
        }
        
        

                        
        if($userUpdate)
        {
            //redirect if successfull
            return redirect()->route('home');
        }
        //redirect to page that brought us here if anything fails
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
