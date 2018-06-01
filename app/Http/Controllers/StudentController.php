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
        $this->validateRequest($request);
        $student = Student::create($request->all());

        return $this->createSuccessResponse("The student with id: {$student->id} has been created", 201);
    }

    public function update(Request $request, $student_id)
    {
        $student = Student::find($student_id);

        if($student){
            $this->validateRequest($request);
            $student->name = $request->get('name');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->career = $request->get('career');

            $student->save();

            return $this->createSuccessResponse("The student with id {$student->id} has been updated", 201);
        }
        return $this->createErrorResponse("The student does not exists", 404);
    }

    public function destroy()
    {
        return __METHOD__;
    }

    //---------------------------------------------------------------------------------------------------//

    public function validateRequest($request)
    {
        $rules =[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'career' => 'required|in:engineering,math,physics'
        ];
        $this->validate($request, $rules);
    }


}