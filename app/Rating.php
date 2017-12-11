<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  
  protected $fillable = ['username','score','partner1','partner2','partner3'];
  
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  
}
