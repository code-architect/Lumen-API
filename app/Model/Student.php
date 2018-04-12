<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Teacher extends Eloquent
{
    protected $collection = "teacher";
    protected $primaryKey = "_id";

    protected $fillable = ['_id', 'name', 'address', 'phone', 'career'];
    protected  $hidden = ['created_at', 'updated_at'];

    public function courses()
    {
        return $this->belongsToMany('App\Model\Course');
    }



}
