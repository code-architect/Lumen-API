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

    /**
     * Create a new Student
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validateRequestRules($request);

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

    /**
     * Update students based on student id
     * @param Request $request
     * @param $student_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $student_id)
    {
        $student = Student::find($student_id);

        if($student)
        {
            $this->validateRequestRules($request);

            $student->name = $request->get('name');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->career = $request->get('career');

            $student->save();

            return $this->createSuccessResponse("Student data has been updated successfully", 201);
        }
        return $this->createErrorResponse("The student specified does not exists", 404);
    }

    public function destroy()
    {
        return __METHOD__;
    }

    public function validateRequestRules($request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'career' => 'required',
        ];
        $this->validate($request, $rules);
    }
}
