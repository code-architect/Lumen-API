<?php

namespace App\Http\Controllers;

use App\Model\Student;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::all();

        return $this->createSuccessResponse($student);
    }

    public function store()
    {
        return __METHOD__;
    }

    public function show($id)
    {
        $student = Student::find($id);

        if($student){
            return $this->createSuccessResponse($student);
        }
        return $this->createErrorResponse("Student with id : {$id} does not exists", 404);
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
