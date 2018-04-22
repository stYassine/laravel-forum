<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Discussion;
use App\Channel;
use App\Like;
use App\Reply;
use App\Watcher;


class DashboardController extends Controller
{
    
    public function dashboardPage(){
        
        $users =User::all();
        $discussions =Discussion::all();
        $channels =Channel::all();
        $likes =Like::all();
        $replies =Reply::all();
        $watchers =Watcher::all();
    
        return view('admin.statics')->with([
            'num_users' => $users->count(),
            'num_discussions' => $discussions->count(),
            'num_channels' => $channels->count(),
            'num_likes' => $likes->count(),
            'num_replies' => $replies->count(),
            'num_watchers' => $watchers->count()
        ]);
        
        
    }
    
}
