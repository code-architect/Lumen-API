<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
 class Course extends Model{

     protected $fillable = ['title', 'description', 'value', 'teacher_id'];

     protected $hidden = ['created_at', 'updated_at'];

     public function students()
     {
         return $this->belongsToMany('App\Model\Student');
     }

     public function teacher()
     {
         return $this->belongsTo('App\Model\Teacher');
     }

 }