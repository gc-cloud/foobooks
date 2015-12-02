<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /* Tag belongs to many books */
  public function books() {
      return $this->belongsToMany('\App\Book')->withTimestamps();
  }
}
