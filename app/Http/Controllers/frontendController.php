<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discussion;
use App\Channel;
use App\Reply;
use App\Like;


class frontendController extends Controller
{
    
    public function index(){
        
        $discussions =Discussion::paginate(10);
        
        return view('index')->with('discussions', $discussions);
        
    }
    
    
    public function singlePost($slug){
        
        $discussion =Discussion::where('slug', $slug)->first();
        
        return view('single')->with('discussion', $discussion);
        
    }
    
    
    public function channelDiscussions($slug){
        
        $channel =Channel::where('slug', $slug)->first()->get();
        
        $discussions =$channel->discussions->paginate(10);
        
        return view('channel')->with('discussions', $discussions);
        
    }
    
    
    
    public function addReply(Request $request){
    
        $this->validate($request, [
            'discussion_id' => 'required',
            'body' => 'required|min:3'
        ]);
        
        $reply =new Reply;
        $reply->is_active =0;
        $reply->user_id =Auth::id();
        $reply->discussion_id =$request->discussion_id;
        $reply->body =$request->body;
        $reply->save();
        
        return redirect()->back();
        
    }
    
    
    
    public function likeReply(Request $request){
    
        $this->validate($request, [
            'reply_id' => 'required'
        ]);
        
        $like =new Like;
        $like->user_id =Auth::id();
        $like->reply_id =$request->reply_id;
        $like->save();
        
        return redirect()->back();
        
    }
    
    
    public function unlikeReply(Request $request){
    
        $this->validate($request, [
            'reply_id' => 'required'
        ]);
        
        $like =Like::where('reply_id', $request->reply_id)->where('user_id', Auth::id())->first();
        $like->remove();
        
        return redirect()->back();
        
    }
    
    public function watchDiscussion(Request $request){
    
        $this->validate($request, [
            'discussion_id' => 'required'
        ]);
        
        $watcher =new Watcher;
        $watcher->user_id =Auth::id();
        $watcher->discussion_id =$request->discussion_id;
        $watcher->save();
            
        return redirect()->back();
    }
    
    public function unwatchDiscussion(Request $request){
    
        $this->validate($request, [
            'discussion_id' => 'required'
        ]);
        
        $watcher =Watcher::where('discussion_id', $request->discussion_id)->where('user_id', Auth::id())->first();
        $watcher->delete();
            
        return redirect()->back();
    }
    
    
}
