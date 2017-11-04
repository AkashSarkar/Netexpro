<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
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
       
        if( Auth::check() )
         {
            //dump is used to see the id of the authenticated user that is currently logged in
           // dump(Auth::user()->id);
        //basically we are saying here is find the company where the user who created it is the same user currently logged in 
        //use get() to get the companies of that specific id 
           //$user= User::find(Auth::user()->id);  
            $user= User::find(Auth::user()->id);  
            $post = Post::where('user_id', Auth::user()->id)->get();
            $userpost=DB::table('users')
                         ->join('posts', function ($join) {
                          $join->on('users.id', '=', 'posts.user_id')
                          ;
                          })
                         ->get();
                     
                $userpost=json_decode($userpost,true);

              
              //$post = Post::where('user_id', Auth::user()->id)->get();
              $useravailablepost= DB::table('users')
            ->join('available_for_jobs', 'users.id', '=', 'available_for_jobs.user_id')
            ->get();

            $useravailablepost=json_decode($useravailablepost,true);
        //passing values to view
     // return view('home.home_index')->with('userpost',json_decode($userpost,true));
        return view('home.home_index',['userpost'=> $userpost,'useravailablepost'=>$useravailablepost]);
        }
        

      //$post= Post::all()->sortByDesc('id');
     // $post = DB::table('posts')->where(Post::user_id, Auth::user()->id);
     // $post= Post::find(Auth::user()->id);
     //$post = Post::where('user_id',$user->id);
      // return view(;
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
