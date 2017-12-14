<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AvailableForJob;
use App\User;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AvailableForJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $user= User::find(Auth::user()->id);  
            $useravailablepost= DB::table('users')
              ->join('available_for_jobs', 'users.id', '=', 'available_for_jobs.user_id')
              ->orderBy('available_for_jobs.created_at','desc')
              ->get();

           


              $useravailableComment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('available_for_jobs', 'available_for_jobs.useravailablepost_id', '=', 'comments.commentable_id')
            ->orderBy('comments.created_at','desc')
            ->get();

        return view('template.user_available_post_interface',['user'=>$user,'useravailablepost'=>$useravailablepost,'useravailableComment'=>$useravailableComment]);
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
         $id=time();

        $file = time() . '.'.$request->file('attachment')->getClientOriginalName();
        $destination = base_path() . '/public/uploads/attachment';
        $request->file('attachment')->move($destination, $file);

               if(Auth::check()){
                 $availableforjob = AvailableForJob::create([
                'position' => $request->input('position'),
                'profession' => $request->input('profession'),
                'CV' => $file, 
                'highlight' => $request->input('highlight'),
                'location' => $request->input('location'),
                'useravailablepost_id'=>$id,
                'user_id' => Auth::user()->id,
            ]);


            if($availableforjob){
                return back()->with('success' , 'available for job posted successfully');
            }

        }
        
            return back()->withInput()->with('errors', 'Error creating available for job post');
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
    public function destroy(AvailableForJob $availableforjob)
    {

    $available_for_job_postDelete = AvailableForJob::find( $availableforjob->useravailablepost_id );

         if($available_for_job_postDelete->delete())
        {
            return back()->with('success','project deleted successfully.');
        }

        return back()->withInput()->with('errors', 'project could not be deleted.'); //
    }
}
