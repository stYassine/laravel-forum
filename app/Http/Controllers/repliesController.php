<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reply;
use Auth;

class repliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies =Reply::all();
        
        return view('admin.replies.index')->with('replies', $replies);
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
        
        $this->validate($request, [
            'discussion_id' => 'required|integer',
            'body' => 'required|min:3'
        ]);
        
        $reply =new Reply;
        $reply->is_active =0;
        $reply->user_id =Auth::id();
        $reply->discussion_id =$request->discussion_id;
        $reply->body =$request->body;

        return redirect()->back();
        
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
        $this->validate($request, [
            'discussion_id' => 'required|integer',
            'body' => 'required|min:3'
        ]);
        
        $reply =Reply::find($id);
        $reply->discussion_id =$request->discussion_id;
        $reply->body =$request->body;

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $reply =Reply::find();
        $reply->delete($id);
        
        return redirect()->back();
        
    }
    
}
