<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Channel;
use Session;


class channelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels =Channel::all();
        
        return view('admin.channels.index')->with('channels', $channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.channels.index');
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
            'title' => 'required|max:100'
        ]);
        
        $channel =new Channel;
        $channel->title =$request->title;
        $channel->slug =str_slug($request->title);
        $channel->save();
        
        Session::flash('channel_created', 'Channel Created Successfully');
        
        return redirect()->route('channels.index');
        
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
        $channel =Channel::find($id);
        
        return view('admin.channels.edit')->with('channel', $channel);
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
            'title' => 'required|max:100'
        ]);
        
        $channel =Channel::find($id);
        $channel->title =$request->title;
        $channel->slug =str_slug($request->title);
        $channel->save();
        
        Session::flash('channel_updated', 'Channel Updated Successfully');
        
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel =Channel::find($id);
        $channel->delete();
        
        Session::flash('channel_deleted', 'Channel Deleted Successfully');
        
        return redirect()->route('channels.index');
    }
    
}
