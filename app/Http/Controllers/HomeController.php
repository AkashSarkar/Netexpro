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
           //job posts
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
            
            //post indivisual connection
            $connection_type=$request->input('connection');
            if($connection_type){
                $j=0;
                for($i=0;$i<count($userpost);$i++)
                {
                    $visibility_type=$userpost[$i]['visibilities_type'];
                    $type=json_decode($visibility_type,true);
                    $f=0;
                    for($k=0;$k<count($type);$k++)
                    {
                        if($connection_type==$type[$k]){
                            
                            $post[$j]=$userpost[$i];
                            $j++;
                            $f=1;
                        }
                        if($f==1)
                        break;
                    }
                    
                   
                }
            }
            //all post in home
            else{
                $j=0;
                for($i=0;$i<count($userpost);$i++)
                {
                    $visibility_type=$userpost[$i]['visibilities_type'];
                    $type=json_decode($visibility_type,true);
                    $f=0;
                    for($k=0;$k<count($type);$k++)
                    {
                        if($interest->profession==$type[$k]){
                            
                            $post[$j]=$userpost[$i];
                            $j++;
                            $f=1;
                        }
                        elseif($interest->industry==$type[$k]){
                            
                            $post[$j]=$userpost[$i];
                            $j++;
                            $f=1;
                        }
                        elseif($user->education==$type[$k]){
                            $post[$j]=$userpost[$i];
                            $j++;
                            $f=1;    
                        }
    
    
                        if($f==1)
                        break;
                    }
                    
                   
                }
            }
            
           
                
        return view('home.home_index',['user'=>$user ,'posts'=>$post,'interest'=>$interest,'useravailablepost'=>$useravailablepost, 'jobpost'=>$jobpost]);
        }
        
    }

    public function store(Request $request)
    {
        //
        $connection_type=$request->input('con');
        if($connection_type){
            print_r("this is from store");
            print_r($connection_type);
        }

    
    
    }
   

}