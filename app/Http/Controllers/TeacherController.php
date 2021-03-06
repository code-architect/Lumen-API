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
        $this->validateRequest($request);
        $teacher = Teacher::create($request->all());

        return $this->createSuccessResponse("The teacher with id: {$teacher->id} has been created", 201);
    }


    public function update(Request $request, $teacher_id)
    {
        $teacher = Teacher::find($teacher_id);

        if($teacher){
            $this->validateRequest($request);
            $teacher->name = $request->get('name');
            $teacher->phone = $request->get('phone');
            $teacher->address = $request->get('address');

            $teacher->save();

            return $this->createSuccessResponse("The teacher with id {$teacher->id} has been updated", 201);
        }
        return $this->createErrorResponse("The student does not exists", 404);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if($teacher)
        {
            $courses = $teacher->courses;
            if(sizeof($courses) > 0){
                return $this->createErrorResponse("You can\'t remove a teacher with courses. Remove the course first", 409); // 409 means a conflict with the request
            }
            $teacher->delete();
            return $this->createSuccessResponse("The teacher with id: {$teacher->id} has been removed", 200);
        }
        return $this->createErrorResponse("The teacher does not exists", 404);
    }

//---------------------------------------------------------------------------------------------------//

    public function validateRequest($request)
    {
        $rules =[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ];
        $this->validate($request, $rules);
    }
}