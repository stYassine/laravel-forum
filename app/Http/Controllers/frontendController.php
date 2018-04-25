<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Discussion;
use App\Channel;
use App\Reply;
use App\Like;
use App\Watcher;
use Auth;
use File;


class frontendController extends Controller
{
    
    ////////////////////////////
    /// Main Pages
    ////////////////////////////
    
    public function index(){
        
        $discussions =Discussion::paginate(10);
        
        return view('index')->with('discussions', $discussions);
        
    }
    
    
    public function singlePost($slug){
        
        $discussion =Discussion::where('slug', $slug)->first();
        
        return view('single')->with('discussion', $discussion);
        
    }
    
    
    public function channelDiscussions($slug){
        
        $channel =Channel::where('slug', $slug)->first();
        
        $discussions =$channel->discussions()->get();
        
        return view('channel')->with([
            'discussions' =>  $discussions,
            'channel' => $channel
            ]);
        
    }
    
    
    
    
    
    ////////////////////////////
    /// Single Posts
    ////////////////////////////
    
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
        
        $reply =Reply::find($id);
        
        $like =new Like;
        $like->user_id =Auth::id();
        $like->reply_id =$reply->id;
        $like->save();
        
        return redirect()->back();
        
    }
    
    
    public function unlikeReply(Request $request){
    
        $this->validate($request, [
            'reply_id' => 'required'
        ]);
        
        $reply =Reply::find($id);
        
        $like =Like::where('reply_id', $reply->id)->where('user_id', Auth::id())->first();
        $like->remove();
        
        return redirect()->back();
        
    }
    
    public function watchDiscussion($id){
        
        /*$this->validate($request, [
            'discussion_id' => 'required'
        ]);*/
        
        $discussion =Discussion::find($id);
        
        $watcher =new Watcher;
        $watcher->user_id =Auth::id();
        $watcher->discussion_id =$discussion->id;
        $watcher->save();
            
        return redirect()->back();
    }
    
    
    public function unwatchDiscussion($id){
        
        $discussion =Discussion::find($id);
        
        $watcher =Watcher::where('discussion_id', $discussion->id)->where('user_id', Auth::id())->first();
        $watcher->delete();
            
        return redirect()->back();
    }
    
    
    
    
    ////////////////////////////
    /// Profiles
    ////////////////////////////
    
    
    public function upload_new_avatar(Request $request){
        
        $this->validate($request, [
            'avatar' => 'required'
        ]);
        
        $auth_id =Auth::id();
        $default_avatar ='avatar.png';
        $request_image =$request->avatar->getClientOriginalName();
        
        
        $user =User::find($auth_id);
        
        if($request_image == $default_avatar){
            
            /// do not remove default avatar picture
            
        }else{
            
            File::delete($user->avatar);
            $image =$request->file('avatar');
            $image_name =time().$image->getClientOriginalName();
            $image->move('uploads/avatars', $image_name);
        
            $user->avatar ='uploads/avatars/'.$image_name;
            $user->save();
            
        }
        
        return redirect()->back();
        
    }
    
    
    public function profileDiscussions($id){
        
        $user =User::find($id);
        
        $discussions =$user->discussions()->get();
        
        return view('profileDiscussions')->with([
            'discussions' => $discussions,
            'user' => $user
        ]);
        
    }
    
    public function profileReplies($id){
        
        $user =User::find($id);
        
        $replies =$user->replies()->get();
        
        return view('profileReplies')->with([
            'replies' => $replies,
            'user' => $user
        ]);
        
        
    }
    
    public function profileLikes($id){
        
        $user =User::find($id);
        
        $likes =$user->likes()->get();
        
        return view('profileLikes')->with([
            'likes' => $likes,
            'user' => $user
        ]);
        
    }
    
    
    
}
