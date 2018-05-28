<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model{

    protected $fillable = ['name', 'address', 'phone'];

    protected $hidden = ['created_at', 'updated_at'];

    public function courses()
    {
        return $this->hasMany('App\Model\Course');
    }
}