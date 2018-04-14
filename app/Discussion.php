<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
}
