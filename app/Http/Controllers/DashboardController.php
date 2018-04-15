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
        $discussions =User::all();
        $channels =User::all();
        $likes =User::all();
        $replies =User::all();
        watchers =User::all();
    
        return view('admin.dashboard');
    }
    
}
