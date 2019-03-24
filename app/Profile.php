<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function userBook() {
    	return $this->belongsTo(User::class, 'user_id');
}
}
