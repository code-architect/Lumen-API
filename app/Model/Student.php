<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Student extends Eloquent
{

    protected $collection = "students";
    protected $primaryKey = "_id";

    protected $fillable = ['_id', 'name', 'address', 'phone', 'career'];
    protected  $hidden = ['created_at', 'updated_at'];

    public function courses()
    {
        return $this->belongsToMany('App\Model\Course', null, 'student_id', 'course_id');
    }



}
