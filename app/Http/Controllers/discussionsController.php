<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discussion;
use App\Channel;
use Auth;
use Session;


class discussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions =Discussion::all();
        
        return view('admin.discussions.index')->with('discussions', $discussions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels =Channel::all();
        
        return view('admin.discussions.index')->with('channels', $channels);
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
            'is_active' => 'required|integer',
            'channel_id' => 'required|integer',
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3'
        ]);
        
        $discussion =new Discussion;
        $discussion->is_active =$request->is_active;
        $discussion->user_id =Auth::id();
        $discussion->channel_id =$request->channel_id;
        $discussion->title =$request->title;
        $discussion->slug =str_slug($request->slug);
        $discussion->body =$request->body;
        $discussion->save();
        
        Session::flash('discussion_created', 'Discussion Created Successfully');
        
        return redirect()->route('discussions.index');
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
        $discussion =Discussion::find($id);
        $channels =Channel::all();
        
        return view('admin.discussions.edit')->with([
            'channels' => $channels,
            'discussion' => $discussion
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
            'is_active' => 'required|integer',
            'channel_id' => 'required|integer',
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3'
        ]);
        
        $discussion =Discussion::find($id);
        $discussion->is_active =$request->is_active;
        $discussion->user_id =Auth::id();
        $discussion->channel_id =$request->channel_id;
        $discussion->title =$request->title;
        $discussion->slug =str_slug($request->slug);
        $discussion->body =$request->body;
        $discussion->save();
        
        Session::flash('discussion_updated', 'Discussion Updated Successfully');
        
        return redirect()->route('discussions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discussion =Discussion::find($id);
        $discussion->save();
        
        Session::flash('discussion_deleted', 'Discussion Deleted Successfully');
        
        return redirect()->route('discussions.index');
    }
    
}
