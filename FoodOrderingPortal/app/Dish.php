<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //mass assignment
    protected $fillable=['name','price'];

    function user(){
        return $this->belongsTo('App\User');
    }
}
