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
use Response;
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

            $allUser = User::all();
        
            //avg rating
           $avg_rating = DB::table('ratings')
           ->select( DB::raw('AVG(rating) as avg_rating'),'post_id')
           ->groupBy('post_id')
           ->get();

           //dd($avg_rating);
           //end avg rating

           //check if user rated post or not
           $isLike=Rating::where('user_id',Auth::user()->id)->get();
           $isLike=json_decode( $isLike,true);
           //end of check rated post

           
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
          

            $userComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'posts.post_id', '=', 'comments.commentable_id')
            ->select('comments.id','comments.created_at','firstname','p_pic','body','commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();


            $userCommentReply = DB::table('replies')
            ->join('comments','comments.id','=','replies.comment_id')
            ->join('users', 'users.id', '=', 'replies.user_id')
            ->join('posts', 'posts.post_id', '=', 'replies.commentable_id')
             ->select('replies.id','replies.created_at','firstname','p_pic','replies.body','replies.commentable_id','comment_id')
            ->orderBy('replies.created_at','asc')
            ->get();

            //dd($userCommentReply);
            

            $images=Imagepost::all();
            
            $interest= DB::table('interests')
            ->where([
            ['user_id', '=', Auth::user()->id],
            ['interest_priority','=',10]
            ])->first();
            //dd($interest);
            
            //showing Users Posts according to users connection
            $post=null;
            
            //dd($current);
            //post individual connection
            $connection_type=$request->input('connection');
            
            if($connection_type){
               
                $post=DB::table('users')
                ->join('interests', 'users.id', '=', 'interests.user_id')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->join('visibilities', 'posts.post_id', '=', 'visibilities.post_id')
                ->where([
                    ['visibilities_type','=',$connection_type],
                    ['interest_priority','=','10']
                ])
                ->orderBy('posts.created_at','desc')
                ->get();
                //dd($post);
                
                //adding average ratings with post
                for($i=0;$i<count($post);$i++)
                {
                    
                    if($post[$i]->post_type=="project"){
                        
                        for($rate=0;$rate<count($avg_rating);$rate++){
                            if($post[$i]->post_id==$avg_rating[$rate]->post_id)
                            {
                                $post[$i]->ratting =$avg_rating[$rate]->avg_rating;
                            }
                        }
                    }
                   
                }
                 //end of average rating
            }
            //all post in home
           else{

                //gets 45% values of industry
                $industry_posts=DB::table('users')
                ->join('interests', 'users.id', '=', 'interests.user_id')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->join('visibilities', 'posts.post_id', '=', 'visibilities.post_id')
                ->where([
                    ['visibilities_type','=',$interest->industry],
                    ['interest_priority','=','10'],
                    ['posts.created_at','>',DB::raw('(select max(created_at)-INTERVAL 10 minute from posts)')]
                ])
                ->orderBy('posts.created_at','desc')
                ->get();
                //end of gets 45% values of industry
                //adding average ratings with post
                for($i=0;$i<count($industry_posts);$i++)
                {
                    
                    if($industry_posts[$i]->post_type=="project"){
                        
                        for($rate=0;$rate<count($avg_rating);$rate++){
                            if($industry_posts[$i]->post_id==$avg_rating[$rate]->post_id)
                            {
                                $industry_posts[$i]->ratting =$avg_rating[$rate]->avg_rating;
                            }
                        }
                    }
                   
                }
                 //end of average rating
                //gets 35% values of profession
                $profession=$interest->profession;
                $ind=$interest->industry;
                
                $profession_posts=DB::select('SELECT 
                            users.firstname,
                            users.lastname,
                            users.cover_pic,
                            users.p_pic,
                            posts.row_no,
                            posts.description,
                            posts.url,
                            posts.post_type,
                            posts.file_attach,
                            posts.ratting,
                            posts.post_id,
                            posts.user_id,
                            posts.created_at,
                            posts.updated_at,
                            visibilities.visibilities_type,
                            visibilities.post_id 
                            FROM users  JOIN posts JOIN visibilities 
                            WHERE users.id=posts.user_id AND posts.created_at > (select max(created_at)-INTERVAL 10 minute from posts)
                            AND posts.post_id = visibilities.post_id 
                            AND visibilities_type = :profession
                            GROUP BY visibilities.visibilities_type,
                            visibilities.post_id,
                            users.firstname,
                            users.lastname,
                            users.cover_pic,
                            users.p_pic,
                            posts.row_no,
                            posts.description,
                            posts.url,
                            posts.post_type,
                            posts.file_attach,
                            posts.ratting,
                            posts.post_id,
                            posts.user_id,
                            posts.created_at,
                            posts.updated_at
                            HAVING visibilities.post_id 
                            not in (SELECT post_id FROM visibilities WHERE visibilities_type = :industry)
                            ORDER BY posts.created_at desc',
                            ['profession'=>$profession,'industry'=>$ind]);
                //end of gets 35% values of profession


                //adding average ratings with post
                for($i=0;$i<count( $profession_posts);$i++)
                {
                    
                    if( $profession_posts[$i]->post_type=="project"){
                        
                        for($rate=0;$rate<count($avg_rating);$rate++){
                            if( $profession_posts[$i]->post_id==$avg_rating[$rate]->post_id)
                            {
                                $profession_posts[$i]->ratting =$avg_rating[$rate]->avg_rating;
                            }
                        }
                    }
                   
                }
                 //end of average rating

                //gets 20% values of education
                $education=$user->education;
                $profession=$interest->profession;
                $ind=$interest->industry;
               // dd($education);
                $education_posts=DB::select('SELECT 
                            users.firstname,
                            users.lastname,
                            users.cover_pic,
                            users.p_pic,
                            posts.row_no,
                            posts.description,
                            posts.url,
                            posts.post_type,
                            posts.file_attach,
                            posts.ratting,
                            posts.post_id,
                            posts.user_id,
                            posts.created_at,
                            posts.updated_at,
                            visibilities.visibilities_type,
                            visibilities.post_id
                            FROM users  JOIN posts JOIN visibilities 
                            WHERE users.id=posts.user_id AND posts.created_at > (select max(created_at)-INTERVAL 10 minute from posts)
                            AND posts.post_id = visibilities.post_id 
                            AND visibilities_type = :education
                            GROUP BY visibilities.visibilities_type , 
                            users.firstname,
                            users.lastname,
                            users.cover_pic,
                            users.p_pic,
                            posts.row_no,
                            posts.description,
                            posts.url,
                            posts.post_type,
                            posts.file_attach,
                            posts.ratting,
                            posts.post_id,
                            posts.user_id,
                            posts.created_at,
                            posts.updated_at,
                            visibilities.post_id
                            HAVING visibilities.post_id 
                            not in (SELECT post_id FROM visibilities 
                            WHERE visibilities_type = :industry OR  visibilities_type = :profession) 
                            ORDER BY posts.created_at desc',
                            ['education'=>$education,'industry'=>$ind,'profession'=>$profession]);
                //end of gets 20 % values of education

                 //adding average ratings with post
                 for($i=0;$i<count($education_posts);$i++)
                 {
                     
                     if($education_posts[$i]->post_type=="project"){
                         
                         for($rate=0;$rate<count($avg_rating);$rate++){
                             if(  $education_posts[$i]->post_id==$avg_rating[$rate]->post_id)
                             {
                                $education_posts[$i]->ratting =$avg_rating[$rate]->avg_rating;
                             }
                         }
                     }
                    
                 }
                  //end of average rating
                //dd($education_posts);
                //$post = array_merge( $industry_posts->toArray(), $profession_posts->toArray(),$education_posts->toArray());
                $collection = $industry_posts->merge($profession_posts);
                $post=$collection->merge($education_posts);
                $post=$post->sortByDesc('created_at');
               //dd();
                
            }
            $user_rate_info=DB:: select('SELECT user_id,post_id,p_pic,firstname,lastname,ratings.created_at 
                            FROM users  join ratings 
                            WHERE ratings.user_id= users.id');
       
        return view('home.home_index',['user'=>$user ,'posts'=>$post,'images'=>$images,'interest'=>$interest,
        'useravailablepost'=>$useravailablepost, 'jobpost'=>$jobpost,'userComment'=>$userComment, 
        'isLiked'=>$isLike,'user_rate_info'=>$user_rate_info, 'userCommentReply'=>$userCommentReply]);
        }
        
    }


    public function get_post(Request $request)
    {
        if( Auth::check() )
        {
            $last_post_id=$request->last_p_id;
            $page=$request->page;
            //echo "hello";
            $timeInterval=DB::select('(select max(created_at)-INTERVAL 10 minute as timeInterval from posts where row_no<:last_post_id)',['last_post_id'=>$last_post_id]);
            //$timeInterval=json_decode($timeInterval,true);
            $timeInterval=$timeInterval[0]->timeInterval;
            //return $timeInterval[0]->timeInterval;

            $user= User::find(Auth::user()->id); 
            
            $interest=DB::table('interests')
            ->where([
            ['user_id', '=', Auth::user()->id],
            ['interest_priority','=',10]
            ])->first();
    
            //return Response::json($interest); 
            
           $userComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'posts.post_id', '=', 'comments.commentable_id')
            ->select('comments.id','comments.created_at','firstname','p_pic','body','commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();

            $userCommentReply = DB::table('replies')
            ->join('comments','comments.id','=','replies.comment_id')
            ->join('users', 'users.id', '=', 'replies.user_id')
            ->join('posts', 'posts.post_id', '=', 'replies.commentable_id')
             ->select('replies.id','replies.created_at','firstname','p_pic','replies.body','replies.commentable_id','comment_id')
            ->orderBy('replies.created_at','asc')
            ->get();

    
            $user_rate_info=DB::select('SELECT user_id,post_id,p_pic,firstname,lastname,ratings.created_at 
            FROM users  join ratings 
            WHERE ratings.user_id= users.id');
    
    //return Response::json($user_rate_info); 
    
            //avg rating
            $avg_rating = DB::table('ratings')
            ->select( DB::raw('AVG(rating) as avg_rating'),'post_id')
            ->groupBy('post_id')
            ->get();
            
      //return Response::json($avg_rating); 
            //dd($avg_rating);
            //end avg rating
    
            //check if user rated post or not
            $isLiked=Rating::where('user_id',Auth::user()->id)->get();
            $isLiked=json_decode( $isLiked,true);
            
            //end of check rated post
            //return Response::json($isLiked); 
    
            $images=Imagepost::all();
           // return Response::json($images);
            //gets 45% values of industry
            $industry_posts=DB::table('users')
            ->join('interests', 'users.id', '=', 'interests.user_id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->join('visibilities', 'posts.post_id', '=', 'visibilities.post_id')
            ->where([
                ['visibilities_type','=',$interest->industry],
                ['interest_priority','=','10'],
                ['row_no','<',$last_post_id],
                ['posts.created_at','>', $timeInterval]
            ])
            ->orderBy('posts.created_at','desc')
            ->get();
            //end of gets 45% values of industry
            //adding average ratings with post
            //return Response::json($industry_posts);
            for($i=0;$i<count($industry_posts);$i++)
            {
                
                if($industry_posts[$i]->post_type=="project"){
                    
                    for($rate=0;$rate<count($avg_rating);$rate++){
                        if($industry_posts[$i]->post_id==$avg_rating[$rate]->post_id)
                        {
                            $industry_posts[$i]->ratting =$avg_rating[$rate]->avg_rating;
                        }
                    }
                }
               
            }
             //end of average rating
            //gets 35% values of profession
            $profession=$interest->profession;
            $ind=$interest->industry;
            
            $profession_posts=DB::select('SELECT 
                        users.firstname,
                        users.lastname,
                        users.cover_pic,
                        users.p_pic,
                        posts.row_no,
                        posts.description,
                        posts.url,
                        posts.post_type,
                        posts.file_attach,
                        posts.ratting,
                        posts.post_id,
                        posts.user_id,
                        posts.created_at,
                        posts.updated_at,
                        visibilities.visibilities_type,
                        visibilities.post_id 
                        FROM users  JOIN posts JOIN visibilities 
                        WHERE users.id=posts.user_id AND row_no < :last_post_id 
                        AND posts.created_at > :timeInterval
                        AND posts.post_id = visibilities.post_id 
                        AND visibilities_type = :profession
                        GROUP BY visibilities.visibilities_type,
                        visibilities.post_id,
                        users.firstname,
                        users.lastname,
                        users.cover_pic,
                        users.p_pic,
                        posts.row_no,
                        posts.description,
                        posts.url,
                        posts.post_type,
                        posts.file_attach,
                        posts.ratting,
                        posts.post_id,
                        posts.user_id,
                        posts.created_at,
                        posts.updated_at
                        HAVING visibilities.post_id 
                        not in (SELECT post_id FROM visibilities WHERE visibilities_type = :industry)
                        ORDER BY posts.created_at desc',
                        ['profession'=>$profession,'industry'=>$ind,'last_post_id'=>$last_post_id,
                        'timeInterval'=>$timeInterval]);
            //end of gets 35% values of profession
           // return Response::json($profession_posts);
    
            //adding average ratings with post
            for($i=0;$i<count( $profession_posts);$i++)
            {
                
                if( $profession_posts[$i]->post_type=="project"){
                    
                    for($rate=0;$rate<count($avg_rating);$rate++){
                        if( $profession_posts[$i]->post_id==$avg_rating[$rate]->post_id)
                        {
                            $profession_posts[$i]->ratting =$avg_rating[$rate]->avg_rating;
                        }
                    }
                }
               
            }
             //end of average rating
    
            //gets 20% values of education
            $education=$user->education;
            $profession=$interest->profession;
            $ind=$interest->industry;
           // dd($education);
            $education_posts=DB::select('SELECT 
                        users.firstname,
                        users.lastname,
                        users.cover_pic,
                        users.p_pic,
                        posts.row_no,
                        posts.description,
                        posts.url,
                        posts.post_type,
                        posts.file_attach,
                        posts.ratting,
                        posts.post_id,
                        posts.user_id,
                        posts.created_at,
                        posts.updated_at,
                        visibilities.visibilities_type,
                        visibilities.post_id
                        FROM users  JOIN posts JOIN visibilities 
                        WHERE users.id=posts.user_id AND row_no < :last_post_id 
                        AND posts.created_at > :timeInterval
                        AND posts.post_id = visibilities.post_id 
                        AND visibilities_type = :education
                        GROUP BY visibilities.visibilities_type , 
                        users.firstname,
                        users.lastname,
                        users.cover_pic,
                        users.p_pic,
                        posts.row_no,
                        posts.description,
                        posts.url,
                        posts.post_type,
                        posts.file_attach,
                        posts.ratting,
                        posts.post_id,
                        posts.user_id,
                        posts.created_at,
                        posts.updated_at,
                        visibilities.post_id
                        HAVING visibilities.post_id 
                        not in (SELECT post_id FROM visibilities 
                        WHERE visibilities_type = :industry OR  visibilities_type = :profession) 
                        ORDER BY posts.created_at desc',
                        ['education'=>$education,'industry'=>$ind,'profession'=>$profession,'last_post_id'=>$last_post_id,
                        'timeInterval'=>$timeInterval]);
            //end of gets 20 % values of education
           // return Response::json($education_posts);
             //adding average ratings with post
             for($i=0;$i<count($education_posts);$i++)
             {
                 
                 if($education_posts[$i]->post_type=="project"){
                     
                     for($rate=0;$rate<count($avg_rating);$rate++){
                         if(  $education_posts[$i]->post_id==$avg_rating[$rate]->post_id)
                         {
                            $education_posts[$i]->ratting =$avg_rating[$rate]->avg_rating;
                         }
                     }
                 }
                
             }
              //end of average rating
            //dd($education_posts);
            //$post = array_merge( $industry_posts->toArray(), $profession_posts->toArray(),$education_posts->toArray());
            $collection = $industry_posts->merge($profession_posts);
            $post=$collection->merge($education_posts);
            $post=$post->sortByDesc('created_at');
           // return Response::json($post); 
       
        return [
                'posts' => view('Ajax.index')->with(compact('user','post','images','avg_rating','isLiked',
                'user_rate_info','page','userComment', 'userCommentReply'))->render()
                
            ];

        }
        
    }

    public function store(Request $request)
    {
       
    }


}