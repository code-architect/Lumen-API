<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Course extends Eloquent
{
    protected $collection = "teacher";

    protected $fillable = ['id', 'title', 'description', 'value'];
    protected  $hidden = ['created_at', 'updated_at'];

    public function students()
    {
        return $this->belongsToMany('App\Model\Student');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Model\Teacher');
    }



}
