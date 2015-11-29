<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  /*Author has many Books. Define a one-to-many relationship.*/
  public function book() {
   return $this->hasMany('\App\Book');
  }
}
