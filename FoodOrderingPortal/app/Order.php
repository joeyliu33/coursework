<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //mass assignment
    protected $fillable=['user_id','dish_id'];

    function user(){
        return $this->hasMany('App\User');
    }

    function Dish(){
        return $this->hasMany('App\Dish');
    }
}
