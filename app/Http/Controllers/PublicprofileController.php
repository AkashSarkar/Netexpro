<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Visibility;
use App\Interest;
use App\jobpost;
use App\Imagepost;
use App\Comment;
use App\Rating;
use App\AvailableForJob;

use Illuminate\Support\Facades\Auth;

use Image;

class PublicprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$jobpost_id,$employer_id)
    {
       
       $images=Imagepost::all();
       $user= DB::table('users')->where( 'id', '=', $id)->first();
      
       $interest= DB::table('interests')
          ->where([
          ['user_id', '=', $id],
          ['interest_priority','=',10]
          ])->first();

       $no_of_project_done_by_user = Post::where('post_type','=','project')->where('user_id','=', $id)->count();
        
       $post = Post::where('user_id','=', $id)
             
              ->orderBy('created_at','desc')
              ->get();
     
       $useravailablepost= DB::table('users')
            ->join('available_for_jobs', 'users.id', '=', 'available_for_jobs.user_id')
            ->get();  


       //avg rating
       $avg_rating = DB::table('ratings')
       ->select( DB::raw('AVG(rating) as avg_rating'),'post_id')
       ->groupBy('post_id')
       ->get();

       //check if user rated post or not
       $isLike=Rating::where('user_id','=', $id)->get();
       $isLike=json_decode( $isLike,true);
       //end of check rated post

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

      
      

      $userComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'posts.post_id', '=', 'comments.commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();

            
    $userCommentReply = DB::table('replies')
    ->join('comments','comments.id','=','replies.comment_id')
    ->join('users', 'users.id', '=', 'replies.user_id')
    ->join('posts', 'posts.post_id', '=', 'replies.commentable_id')
    ->select('replies.id','replies.created_at','firstname','p_pic','replies.body','replies.commentable_id','comment_id')
    ->orderBy('replies.created_at','asc')
    ->get();


      $choices= DB::table('interests')
        ->where([
        ['user_id', '=',$id],
        ['interest_priority','=',0]
        ])->get();
       
       $user_rate_info=DB:: select('SELECT user_id,post_id,p_pic,firstname,lastname,ratings.created_at 
      FROM users  join ratings 
      WHERE ratings.user_id= users.id  ');

      $is_hired=DB::table('hire_info')->where(
          [
              ['employee_id','=',$id],
              ['hire_post_id','=',$jobpost_id]
          ]
         )->first();
      //dd($is_hired);


    

      $total_avg_rating=0.00;
      $no_of_projects_id__by_user=DB::table('posts')
       ->where([
          ['posts.post_type', '=', 'project'],
          ['posts.user_id', '=', $id]
         ])
        ->select('posts.post_id')
        ->get();
     // dd($no_of_projects_id__by_user[0]->post_id);
       if(count($no_of_projects_id__by_user)>0){

        
        for($i=0;$i<count($no_of_projects_id__by_user);$i++)
        {
           $per_project_rating = DB::table('ratings')
          ->select( DB::raw('AVG(rating) as avg_rating'),'post_id')
          ->where('ratings.post_id','=',$no_of_projects_id__by_user[$i]->post_id)
          ->groupBy('post_id')
          ->get(); 
        //  dd($per_project_rating);
          if(count($per_project_rating)>0)
          {
             // dd(count($per_project_rating));
            $int = (double)$per_project_rating[0]->avg_rating;
            $total_avg_rating=$total_avg_rating+$int;
          }
          
        }
       $total_avg_rating=(double)($total_avg_rating/count($no_of_projects_id__by_user));
       //dd($total_avg_rating);

     }

     return view('profile.public_view',['user'=>$user,'images'=>$images ,
     'interest'=>$interest,'choices'=>$choices ,'posts'=>$post,'useravailablepost'=>$useravailablepost, 
     'projects'=>$no_of_project_done_by_user, 'userComment'=>$userComment, 
     'isLiked'=>$isLike,'user_rate_info'=>$user_rate_info,'jobpost_id'=>$jobpost_id,'employer_id'=>$employer_id,
     'employee_id'=>$id,'is_hired'=>$is_hired,'total_avg_rating'=>$total_avg_rating,'userCommentReply'=> $userCommentReply]);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
         //return view('profile.public_view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
