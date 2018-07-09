<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumes extends Model
{
    //
    protected $table = 'resumes';
    protected $guarded = ['id'];
    protected $dates = ['resumes_date'];
}
