<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Visibility;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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
           
            $visibility=Visibility::create([
                
               'visibilities_type'=>json_encode($request->input('type')),
                'post_id'=>$id
            ]);
            
          if($post)
               { return redirect()->route('home.index', ['user_id'=> Auth::user()->id])
                ->with('success' , 'Successfully Post');
               }
            
        }
        return back()->withInput();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
