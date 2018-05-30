<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    protected $fillable = [ 'name', 'address', 'phone', 'career'];

    protected $hidden = ['created_at', 'updated_at'];

    public function courses()
    {
        return $this->belongsToMany('App\Model\Course');
    }
}
