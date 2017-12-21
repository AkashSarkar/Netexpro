<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Visibility;
use App\Imagepost;
use Image;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{

     //protected $primaryKey = 'post_id';
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

   
    public function store(Request $request)
    {
        //
       $id=time();
       
        if(Auth::check()){
            

           /* $request->validate([
                "type"=> 'required',
                "post_images[]" =>'mimes:jpg,jpeg,bmp,png',
            ]);*/

            $fileArray = array('image' => $request->input('post_images[]'));
            $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails())
            {
            return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
            }



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
         
                }
                    return redirect()->route('home.index', ['user_id'=> Auth::user()->id])
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

 
        $postDelete = Post::find( $post->post_id );
       

        if($postDelete->delete())
        {
            return back()->with('success','project deleted successfully.');
        }

        return back()->withInput()->with('errors', 'project could not be deleted.'); 
       
       
    }
}
