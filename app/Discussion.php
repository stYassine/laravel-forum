<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Discussion extends Model
{
    
    protected $fillable =[
        'channel_id', 'user_id', 'title', 'slug', 'body'
    ];
    
    public function channel(){
        return $this->belongsTo(Channel::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    
    public function watchers(){
        return $this->hasMany(Watcher::class);
    }
    
    
    public function is_watched_by_auth(){
        
        $id =Auth::id();
        
        $watchers =array();
        
        foreach($this->watchers as $watcher){
            array_push($watchers, $watcher->user_id);
        }
        
        if(in_array($id, $watchers)){
            return true;
        }else{
            return false;
        }
        
    }
    
}
