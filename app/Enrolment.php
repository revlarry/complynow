<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
   protected $fillable = [
       'fname',
       'mname',
       'lname',
       'company',
       'training',
       'startdate',
       'startdate',
       'enddate',
       'upload_id',
       'src',

   ];

   
}

