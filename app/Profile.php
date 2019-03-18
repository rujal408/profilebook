<?php

namespace App;


class Profile extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
