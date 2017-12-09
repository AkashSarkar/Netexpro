<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
      $images=Imagepost::all();

      $user= User::find(Auth::user()->id);
      //$post = Post::where('user_id', Auth::user()->id)->get();
      $no_of_project_done_by_user = Post::where('post_type','=','project')->where('user_id', Auth::user()->id)->count();
      
      $jobpost = jobpost::where('user_id', Auth::user()->id)->get();
      $useravailablepost = AvailableForJob::where('user_id', Auth::user()->id)->get();
      
      
      $post = Post::where('user_id', Auth::user()->id)
      ->orderBy('created_at','desc')
      ->get();


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

      $jobComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('jobposts', 'jobposts.jobpost_id', '=', 'comments.commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();

      $useravailableComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('available_for_jobs', 'available_for_jobs.useravailablepost_id', '=', 'comments.commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();
      
        $interest= DB::table('interests')
        ->where([
        ['user_id', '=', Auth::user()->id],
        ['interest_priority','=',10]
        ])->first();

        $choices= DB::table('interests')
        ->where([
        ['user_id', '=', Auth::user()->id],
        ['interest_priority','=',0]
        ])->get();
        //dd($choices);


      $user_rate_info=DB:: select('SELECT user_id,post_id,p_pic,firstname,lastname,ratings.created_at 
      FROM users  join ratings 
      WHERE ratings.user_id= users.id  ');

      return view('profile.profile_index',['user'=>$user,'images'=>$images ,'interest'=>$interest,'choices'=>$choices ,'posts'=>$post,'jobpost'=>$jobpost,'useravailablepost'=>$useravailablepost, 'projects'=>$no_of_project_done_by_user, 'userComment'=>$userComment, 'jobComment'=>$jobComment, 
        'useravailableComment'=>$useravailableComment,'isLiked'=>$isLike,'user_rate_info'=>$user_rate_info]);
          
      
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
              $check=0;
         
              if($request->hasFile('cover'))
               {
                   $cover = $request->file('cover');
                   $filename = time() . '.' . $cover->getClientOriginalExtension();
                   Image::make($cover)->save( public_path('/uploads/cover/' . $filename ) );
        
                   $user = Auth::user();
                   $user->cover_pic = $filename;
                   $user->save();
                   $check=1;
                   return redirect()->route('profile.index', ['user'=>Auth::user()->id])->with('success','Cover Picture Updated Successfully');
               }

               else if($request->hasFile('profile'))
               {
                $profile = $request->file('profile');
                $filename = time() . '.' . $profile->getClientOriginalExtension();
                Image::make($profile)->resize(400,400)->save( public_path('/uploads/profile/' . $filename ) );
     
                $user = Auth::user();
                $user->p_pic = $filename;
                $user->save();

               
            
                $check=1;
                return redirect()->route('profile.index', ['user'=>Auth::user()->id])->with('success','Profile Updated Successfully');
               }


        if($check==0){
          $id=time();
       
        if(Auth::check()){
            $request->validate([
                "type"=> 'required'
            ]);
            $post = Post::create([
                'post_id'=>$id,
                'description' => $request->input('description'),
                'url' => $request->input('url'),
                'post_type'=>$request->input('post_type'),
                'user_id'=>Auth::user()->id
            ]);
            
           
            $connections=$request->input('type');
            for($i=0;$i<count($connections);$i++){
                $visibility=Visibility::create([
                    
                   'visibilities_type'=>$connections[$i],
                    'post_id'=>$id
                ]);
            }
           
          if($post)
               { 
                
                   
                if ($request->hasFile('post_images'))
                {
                   
        
                    foreach($request->post_images as $images)
                    {
        
                        $filename = time() . '.' .$images->getClientOriginalName();
                        Image::make($images)->save( public_path('/uploads/postimages/' . $filename ) );
                        
                        $imagepost = Imagepost::create([
                            'post_id'=>$id,
                            'post_image' => $filename,
                        ]);
        
                    } 
        
                return redirect()->route('profile.index', ['user_id'=> Auth::user()->id])
                ->with('success' , 'Successfully Post');
               }



            
        }
           return back()->withInput();
               }
    }
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
        
        $user = User::where('id',Auth::user()->id)->first();
      //  $interest= Interest::find(Auth::user()->id);

       return view('profile.profile_edit', ['user'=> $user]);
      // return view('profile.profile_edit1', ['interest'=>$interest]);

    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //save data

        $userUpdate = User::where('id',Auth::user()->id)->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'education' => $request->input('education'),
             'email' => $request->input('email'),
             'phone_no' => $request->input('phone_no'),
             'gender' => $request->input('gender'),
             'dob' => $request->input('dob'),
             'location' => $request->input('location'),
             'available_for_job' => $request->input('available_for_job'),
             
            ]);

          if($userUpdate){               
            
            return redirect()->route('profile.index', ['user'=>Auth::user()->id])->with('success','Profile Updated Successfully');
            }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Post $post)
    {
      
       
    }
}
