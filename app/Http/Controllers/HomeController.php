<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Visibility;
use App\Interest;
use App\Imagepost;
use App\Rating;
use App\Comment;
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
            
           //job posts
            $user= User::find(Auth::user()->id);  
            $allPost = Post::all();

           // $postss = Post::where('user_id', Auth::user()->id)->get();

           $avg_rating = DB::table('ratings')
           ->select( DB::raw('AVG(rating) as avg_rating'),'post_id')
           ->groupBy('post_id')
           ->get();
           
           

            //$comments = DB::table('comments')->join('posts', 'comments.post_id', '=', 'posts.post_id')->get();
               

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
            //->join('comments', 'posts.post_id','=','comments.commentable_id')
            ->orderBy('posts.created_at','desc')
            ->get();
          
            $userpost=json_decode($userpost,true); 

           // $comment = DB::table('posts')->join('comments', 'posts.post_id','=','comments.commentable_id')->get();
             //dd($comment);
            //dd($userpost);
            //image get for post

          /*  $imagepost= DB::table('posts')
            ->join('imageposts', 'posts.post_id', '=', 'imageposts.post_id')
            ->get();
            $imagepost=json_decode($imagepost,true);*/ 
            $comments=Comment::all();
            $images=Imagepost::all();
            
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
                    //$image=json_decode($userpost[$i]['images'],true);
                    $type=json_decode($visibility_type,true);
                    $f=0;
                    for($k=0;$k<count($type);$k++)
                    {
                        if($connection_type==$type[$k]){
                            
                            $post[$j]=$userpost[$i];
                            //adding average ratings with post
                            if($post[$j]['post_type']=="project"){
                                
                                for($rate=0;$rate<count($avg_rating);$rate++){
                                    if($post[$j]['post_id']==$avg_rating[$rate]->post_id)
                                    {
                                        $post[$j]['ratting'] =$avg_rating[$rate]->avg_rating;
                                    }
                                }
                            }
                            //end of average rating
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
                   // $image=json_decode($userpost[$i]['images'],true);
                    //dd($image);
                    $f=0;
                    for($k=0;$k<count($type);$k++)
                    {
                        if($interest->profession==$type[$k]){
                            
                            $post[$j]=$userpost[$i];
                            //adding average ratings with post
                            if($post[$j]['post_type']=="project"){
                                
                                for($rate=0;$rate<count($avg_rating);$rate++){
                                    if($post[$j]['post_id']==$avg_rating[$rate]->post_id)
                                    {
                                        $post[$j]['ratting'] =$avg_rating[$rate]->avg_rating;
                                    }
                                }
                            }
                            //end of average rating
                            $j++;
                            $f=1;
                        }
                        elseif($interest->industry==$type[$k]){
                            
                            $post[$j]=$userpost[$i];
                            //adding average ratings with post
                            if($post[$j]['post_type']=="project"){
                                
                                for($rate=0;$rate<count($avg_rating);$rate++){
                                    if($post[$j]['post_id']==$avg_rating[$rate]->post_id)
                                    {
                                        $post[$j]['ratting'] =$avg_rating[$rate]->avg_rating;
                                    }
                                }
                            }
                            //end of average rating
                            $j++;
                            $f=1;
                        }
                        elseif($user->education==$type[$k]){
                            $post[$j]=$userpost[$i];
                            //adding average ratings with post
                            if($post[$j]['post_type']=="project"){
                                
                                for($rate=0;$rate<count($avg_rating);$rate++){
                                    if($post[$j]['post_id']==$avg_rating[$rate]->post_id)
                                    {
                                        $post[$j]['ratting'] =$avg_rating[$rate]->avg_rating;
                                    }
                                }
                            }
                            //end of average rating
                            $j++;
                            $f=1;    
                        }
    
    
                        if($f==1)
                        break;
                    }
                    
                   
                }
            }
            
           
                
        return view('home.home_index',['user'=>$user ,'posts'=>$post,'images'=>$images,'interest'=>$interest,'useravailablepost'=>$useravailablepost, 'jobpost'=>$jobpost,'comments'=>$comments]);
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