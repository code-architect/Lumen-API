<?php

namespace App\Http\Controllers;

use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller{

    public function index()
    {
        $students = Student::all();
        return $this->createSuccessResponse($students);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if($student){
            return $this->createSuccessResponse($student);
        }
        return $this->createErrorResponse("The course with id {$id}, does not exists", 404);
    }

    public function store(Request $request)
    {
        $rules =[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'career' => 'required|in:engineering,math,physics'
        ];
        $this->validate($request, $rules);
        $student = Student::create($request->all());

        return $this->createSuccessResponse("The student with id: {$student->id} has been created", 201);
    }

    public function update()
    {

    }

    public function destroy()
    {
        return __METHOD__;
    }


}