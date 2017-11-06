<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Visibility;
use App\Interest;
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
        
       // $user = User::where('id', $user->id)->first();
       // dd($user);

       // $user = User::where('id', Auth::user()->id)->first();

      $user= User::find(Auth::user()->id);
      $post = Post::where('user_id', Auth::user()->id)->get();
      // $interest = I::where('id', Auth::user()->id)->first();
      $interest= Interest::find(Auth::user()->id);
      return view('profile.profile_index',['user'=>$user, 'interest'=>$interest, 'posts'=>$post]);
          
      
    }

            public function update_avatar(Request $request){
        
               // Logic for user upload of avatar
            
               
        
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
              // else{
              //  return redirect()->route('profile.index', ['user'=>Auth::user()->id])->with('errors','Something went wrong,please try again');
             //  }

               if($check==0){

                 $id=time();
       
        if(Auth::check()){
            $request->validate([
                "type"=> 'required'
            ]);
            $post = Post::create([
                'post_id'=>$id,
                'description' => $request->input('description'),
                'user_id'=>Auth::user()->id
            ]);
           
            $visibility=Visibility::create([
                
               'visibilities_type'=>json_encode($request->input('type')),
                'post_id'=>$id
            ]);
            
          if($post)
               { return redirect()->route('profile.index', ['user_id'=> Auth::user()->id])
                ->with('success' , 'Successfully Post');
               }
            
        }
        return back()->withInput();
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

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
