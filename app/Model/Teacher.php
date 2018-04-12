<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Teacher extends Eloquent
{
    protected $collection = "teachers";
    protected $primaryKey = "_id";

    protected $fillable = ['_id', 'name', 'address', 'phone', 'profession'];
    protected  $hidden = ['created_at', 'updated_at'];

    public function courses()
    {
        return $this->hasMany('App\Model\Course');
    }




}
