<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use App\Reply;
use App\User;
use Auth;
use Session;

class likesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes =Like::all();
        
        return view('admin.likes.index')->with('likes', $likes);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =User::all();
        $replies =Reply::all();
        
        return view('admin.likes.create')->with([
            'users' => $users,
            'replies' => $replies
        ]);
        
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
            'user_id' => 'required|integer'
            'reply_id' => 'required|integer'
        ]);
        
        $like =new Like;
        $like->user_id =$request->user_id;
        $like->reply_id =$request->reply_id;
        $like->save();
        
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
        $like =Like::find($id);
        $users =User::all();
        $replies =Reply::all();
        
        return view('admin.likes.edit')->with([
            'like' => $like,
            'users' => $users,
            'replies' => $replies
        ]);
        
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
            'user_id' => 'required|integer'
            'reply_id' => 'required|integer'
        ]);
        
        $like =Like::find($id);
        $like->user_id =$request->user_id;
        $like->reply_id =$request->reply_id;
        $like->save();
        
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
        $like =Like::find($id);
        $like->delete();
        
        return redirect()->back();
        
    }
}
