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
}
