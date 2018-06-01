<?php

namespace App\Http\Controllers;

use App\Model\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller{

    public function index()
    {
        $teachers = Teacher::all();
        return $this->createSuccessResponse($teachers);
    }



    public function show($id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            return $this->createSuccessResponse($teacher);
        }
        return $this->createErrorResponse("The course with id {$id}, does not exists", 404);
    }

    public function store(Request $request)
    {
        $rules =[
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
        $this->validate($request, $rules);
        $teacher = Teacher::create($request->all());

        return $this->createSuccessResponse("The student with id: {$teacher->id} has been created", 201);
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