<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'is_admin', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function discussions(){
        return $this->hasMany(Discussion::class);
    }
    
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    
    public function watchers(){
        return $this->hasMany(Watcher::class);
    }
    
    public function likes(){
        return $this->hasMany(Like::class);
    }
    
    public function is_admin(){
        
        $user =Auth::user();
        
        if($user->is_admin){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function is_active(){
        
        $user =Auth::user();
        
        if($user->is_active){
            return true;
        }else{
            return false;
        }
        
    }
    
    
    
}
