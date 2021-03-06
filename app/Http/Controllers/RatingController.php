<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Post;
use App\Rating;

class RatingController extends Controller
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

    public function isLiked(){
        $isLike=Rating::all();

        return $isLike;
    }

    public function getdata(Request $request)
    {
        $id=$request->post_id;

        $avg_rating = Rating::where('post_id', $id)->avg('rating');
        
        
        /*DB::table('ratings')
        ->select( DB::raw('AVG(rating) as avg_rating,MAX(post_id)'))
        ->where('post_id','=','$id')
        
        ->get();*/

       return $avg_rating;

      
    }


    public function store(Request $request)
    {
        if(Auth::check()){
            

          
            $rate = Rating::create([
                
                'rating' => $request->input('rating'),
                'post_id'=>$request->input('post_id'),
                'user_id'=>Auth::user()->id
            ]);
           }

        if($rate){
           return back()->with('success' , 'Successfully Rating');
               }
       
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
