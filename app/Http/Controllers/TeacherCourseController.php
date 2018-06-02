<?php

namespace App\Http\Controllers;

use App\Model\Course;
use App\Model\Teacher;
use Illuminate\Http\Request;

class TeacherCourseController extends Controller{

    public function index($id)
    {
        $teacher = Teacher::find($id);

        if($teacher)
        {
            $courses = $teacher->courses;
            return $this->createSuccessResponse($courses, 200);
        }
        return $this->createErrorResponse("Does not exists a course with the given id", 404);
    }

    public function store(Request $request, $teacher_id)
    {
        $teacher = Teacher::find($teacher_id);
        if($teacher)
        {
            $this->validateRequest($request);

            $course = Course::create([
                'title' =>  $request->get('title'),
                'description' =>  $request->get('description'),
                'value' =>  $request->get('value'),
                'teacher_id' =>  $teacher_id,
            ]);
            return $this->createSuccessResponse("The course with id: {$course->id} has been created", 201);
        }
        return $this->createErrorResponse("Teacher does not exists with the given id", 404);
    }


    public function update()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }
//---------------------------------------------------------------------------------------------------//

    public function validateRequest($request)
    {
        $rules =[
            'title' => 'required',
            'description' => 'required',
            'value' => 'required'
        ];
        $this->validate($request, $rules);
    }

}