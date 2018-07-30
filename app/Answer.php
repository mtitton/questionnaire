<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //To define what fields can be changed
    protected $fillable = [
        'id_question',
        'txt_answer'
    ];
}
