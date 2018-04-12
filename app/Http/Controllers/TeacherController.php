<?php

namespace App\Http\Controllers;

use App\Model\Teacher;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();

        return $this->createSuccessResponse($teachers);
    }

    public function store()
    {
        return __METHOD__;
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            return $this->createSuccessResponse($teacher);
        }
        return $this->createErrorResponse("Teacher with id : {$id} does not exists", 404);
    }

    public function update()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }
}
