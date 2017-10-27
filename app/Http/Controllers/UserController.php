<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone_no' => 'char|max:11',
            
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::find(Auth::user()->id);
       return view('users.edit',['user'=>$user]);
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
                'available_for_job'=>$request->input('available_for_job'),
                'hiring'=>$request->input('hiring'),
                'post_viewed'=>$request->input('post_viewed'),
                'post_rated'=>$request->input('post_rated'),
                'total_tagged_in'=>$request->input('total_tagged_in'),
                
                
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
