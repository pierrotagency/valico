<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function config(){
        return $this->hasMany(UserConfig::class, 'user_id');
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class, 'user_x_profile', 'user_id', 'profile_id');
    }

    public function picked(){
        return $this->belongsToMany(Folder::class, 'folder_x_user', 'user_id', 'folder_id')->orderBy('sort');
    }

    public function contentClipboard(){
        return Content::where('clipboard_user_id',$this->id)->whereHolder('clipboard')->get();
    }

    public function getConfig($name,$expectsJson=false){

        if($res = $this->config()->select('value')->whereName($name)->first()){
            if($expectsJson){
                return json_decode($res->value);
            }
            else{
                return $res->value;
            }
        }
        else{
            if($expectsJson){
                return [];
            }
            else{
                return '';
            }
        }

    }

    public function isGod(){
        return $this->god==1;
    }

    public function commaProfiles($split = ', '){
        return $this->profiles->implode('name', $split);        
    }

    public function hasProfile($name = ''){
        if($this->isGod()) return true;
        return $this->profiles()->whereName($name)->count();        
    }



    
}
