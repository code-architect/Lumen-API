<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Course extends Eloquent
{
    protected $collection = "courses";
    protected $primaryKey = "_id";

    protected $fillable = ['_id', 'title', 'description', 'value', 'teacher_id'];
    protected  $hidden = ['created_at', 'updated_at'];

    public function students()
    {
        return $this->belongsToMany('App\Model\Student', null, 'course_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Model\Teacher');
    }



}
