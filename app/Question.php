<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    //
    use SoftDeletes;
    public function answers()
    {
        return $this->hasMany('App\Answer', 'qid');
    }

    public function category() {
        return $this->hasOne('App\Category', 'cid');
    }

    public function source() {
        return $this->hasOne('App\Sources', 'sid');
    }
}
