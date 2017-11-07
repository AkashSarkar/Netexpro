<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Visibility;
use App\Interest;
//use App\jobpost;
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
    public function index(Request $request)
    {
        
       
        if( Auth::check() )
         {
            
        //basically we are saying here is find the company where the user who created it is the same user currently logged in 
        //use get() to get the companies of that specific id 
           
            $user= User::find(Auth::user()->id);  
          
            $userpost=DB::table('users')
                         ->join('posts', function ($join) {
                          $join->on('users.id', '=', 'posts.user_id')
                          ;
                          })
                         ->get();
                     
             $userpost=json_decode($userpost,true);
              $useravailablepost= DB::table('users')
              ->join('available_for_jobs', 'users.id', '=', 'available_for_jobs.user_id')
              ->orderBy('available_for_jobs.created_at','desc')
              ->get();

              $useravailablepost=json_decode($useravailablepost,true);

              $jobpost=DB::table('users')
                         ->join('jobposts', function ($join) {
                          $join->on('users.id', '=', 'jobposts.user_id');
                        })->get();
            
             $jobpost=json_decode($jobpost,true);
        //passing values to view
     
            $userpost= DB::table('users')
            ->join('interests', 'users.id', '=', 'interests.user_id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->join('visibilities', 'posts.post_id', '=', 'visibilities.post_id')
            ->orderBy('posts.created_at','desc')
            ->get();
            $userpost=json_decode($userpost,true); 
            
            $interest=Interest::find(Auth::user()->id);
            
            //showing Users Posts according to users connection
            $post=null;
            
            // We set it to 1 if it's checked
            // We set it to 0 if it's not checked
            $connection_type=$request->input('connection');
            
            print_r($connection_type);
            $j=0;
            for($i=0;$i<count($userpost);$i++)
            {
                $visibility_type=$userpost[$i]['visibilities_type'];
                $type=json_decode($visibility_type,true);
                for($k=0;$k<count($type);$k++)
                {
                    if($interest->profession==$type[$k]){
                        
                        $post[$j]=$userpost[$i];
                        $j++;
                    }
                    elseif($interest->industry==$type[$k]){
                        
                        $post[$j]=$userpost[$i];
                        $j++;
                    }
                    elseif($user->education==$type[$k]){
                        $post[$j]=$userpost[$i];
                        $j++;    
                    }


                    if($j>0)
                    break;
                }
                
               
            }
                
        return view('home.home_index',['user'=>$user ,'posts'=>$post,'interest'=>$interest,'useravailablepost'=>$useravailablepost, 'jobpost'=>$jobpost]);
        }
        
    }
    public function store(Request $request)
    {
        //

        
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