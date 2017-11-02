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

        
      $user= User::find(Auth::user()->id);
      $post= Post::all()->sortByDesc('id');
     // $post = DB::table('posts')->where(Post::user_id, Auth::user()->id);
     // $post= Post::find(Auth::user()->id);
     //$post = Post::where('user_id',$user->id);
        return view('home.home_index',['user'=>$user , 'post'=>$post]);
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
