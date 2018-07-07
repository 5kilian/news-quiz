<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    //
    use SoftDeletes;


    public function subscriber() {
        return $this->belongsToMany('App\User', 'category_user', 'category_CID', 'user_id');
    }
}
