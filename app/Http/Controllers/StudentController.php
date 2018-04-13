<?php

namespace App\Http\Controllers;

use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::all();

        return $this->createSuccessResponse($student);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'career' => 'required',
        ];

        $this->validate($request, $rules);

        $student = Student::create($request->all());

        return $this->createSuccessResponse("A student with id of {$student->_id} has been added to database", 201);
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
