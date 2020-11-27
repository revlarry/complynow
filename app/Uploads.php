<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $fillable = [
        'filedesc',
        'path',
        'enrolment_id',
    ];



    public function uploads(){

        return $this->hasMany(Enrolment::class);
    }

}
