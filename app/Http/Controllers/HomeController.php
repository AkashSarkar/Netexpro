<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.home_index');
    }
    public function store(Request $request)
    {
        //

        console.log("hello");
        if(Auth::check()){
            $post = Post::create([
                'description' => $request->input('description'),
                'user_id'=>Auth::user()->id
            ]);
            
          
                return redirect()->route('home.index', ['user_id'=> Auth::user()->id])
                ->with('success' , 'successfully');
            
        }
        return back()->withInput();
        
    }

}
