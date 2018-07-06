<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    //
    protected $hidden = [
        'qid', 'istrue', 'deleted_at', 'created_at','updated_at',
    ];

    use SoftDeletes;
    public function question()
    {
        return $this->belongsTo('App\Question', 'qid','QID');
    }
}
