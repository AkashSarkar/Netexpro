<?php

namespace App\Http\Controllers;


use App\Reply;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\User;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
    public function postComment(Request $request)
    {

        if(Auth::check()){
            $comment = Comment::create([
            'body' => $request->body,
            'commentable_type'=>$request->type,
            'commentable_id'=>$request->post_id,
            'user_id'=>Auth::user()->id  
        ]);
       }
       if($comment){
           return "success";
       }else{
        return "error";
       }
    }
    public function getComment(Request $request)
    {
        //return $request->all();
        $user= User::find(Auth::user()->id); 
        $id=$request->post_id;
        //return $id;
        $userComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'posts.post_id', '=', 'comments.commentable_id')
            ->select('comments.id','comments.created_at','firstname','p_pic','body','commentable_id')
            ->where([
                ['commentable_id','=',$id],
                ['comments.id','>',$request->last_comment_id]
            ])
            ->orderBy('comments.created_at','desc')
            ->get();
            
        
            return [
             view('Ajax.getComments')->with(compact('user','userComment', 'userCommentReply'))->render()
                
            ];
      
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
