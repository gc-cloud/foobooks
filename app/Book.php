<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /* Book belongs to Author.  Define inverse one to many*/
    public function author() {
     return $this->belongsTo('\App\Author');
    }
    /* Book belongs to many Tags */
    public function tags() {
     return $this->belongsToMany('\App\Tag')->withTimestamps();;
 }
}
