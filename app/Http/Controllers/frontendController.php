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
        
        $discussion =Discussion::where('slug', $slug)->first()->get();
        
        return view('single')->with('discussion', $discussion);
        
    }
    
    
    public function channelDiscussions($slug){
        
        $channel =Channel::where('slug', $slug)->first()->get();
        
        $discussions =$channel->discussions->paginate(10);
        
        return view('channel')->with('discussions', $discussions);
        
    }
    
    
    
}
