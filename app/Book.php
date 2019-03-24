<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
        public function userBook()
         {
    	return $this->hasMany(UserBook::class, 'book_id')->orderBy('selling_price');
 }
}
