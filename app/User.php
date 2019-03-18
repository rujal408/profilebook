<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname','lastname', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function prof(){
        return ($this->profile()->create(['user_id'=>$this->id]));
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getName(){

        if($this->firstname && $this->lastname){
            return "{$this->firstname} {$this->lastname}";
        }
        if ($this->firstname){
            return "{$this->firstname}";
        }

        return null;
    }

    public function getNameOrEmail(){
        return $this->getName() ?: $this->email;
    }

    /*My friend...*/
    public function friendsOfMine(){
        return $this->belongsToMany('App\User','friend_user','user_id','friend_id');
    }
    /*I am friend of...*/
    public function friendOf(){
        return $this->belongsToMany('App\User','friend_user','friend_id','user_id');
    }

    public function friends(){
        return $this->friendsOfMine()->wherePivot('accepted',true)->get()->
        merge($this->friendOf()->wherePivot('accepted',true)->get());
    }
    /*Request i received*/
    public function friendRequests(){
        return $this->friendsOfMine()->wherePivot('accepted',false)->get();
    }
    /*Request i sent*/
    public function friendRequestsPending(){
        return $this->friendOf()->wherePivot('accepted',false)->get();
    }

    public function hasFriendRequestPending(User $user){
        return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
    }

    public function hasFriendRequestReceived(User $user){
        return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }

    public function addFriend(User $user){
        $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user){
        $this->friendRequests()->where('id',$user->id)->first()->pivot->
        update([
            'accepted'=>true,
        ]);
    }

    public function rejectFriendRequest(User $user){
        $this->friendRequests()->where('id',$user->id)->first()->pivot->delete();

    }

    public function removeFriend(User $user){
        $this->friends()->where('id',$user->id)->first()->pivot->delete();
    }

    public function isFriendsWith(User $user){
        return (bool) $this->friends()->where('id',$user->id)->count();
    }
}
