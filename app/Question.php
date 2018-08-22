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
        return $this->hasMany('App\Answer', 'qid','QID');
    }

    public function category() {
        return $this->hasOne('App\Category', 'CID','cid');
    }

    public function source() {
        return $this->hasOne('App\Source', 'SID','sid');
    }
    public function FakeornoFake() {
        if(count($this->answers) > 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
