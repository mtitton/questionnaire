<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //To define what fields can be changed
    protected $fillable = [
        'txt_question',
        'cmb_answer',
        'txt_param',
        'flg_required'
    ];
}
