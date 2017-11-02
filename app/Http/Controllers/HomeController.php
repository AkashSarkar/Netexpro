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
            $user= User::find(Auth::user()->id);  
            $post = Post::where('user_id', Auth::user()->id)->get();
              //$user = User::all();
              //$post = Post::all();

        //passing values to view
        return view('home.home_index',['user'=>$user , 'post'=>$post]);
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
