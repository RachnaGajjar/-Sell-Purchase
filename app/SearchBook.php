<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchBook extends Model
{
    //
    public function users() {
    	return $this->hasMany(UserBook::class, 'book_id')->with('user');
}
}