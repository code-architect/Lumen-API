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


    /**
     * Updating the teachers in the course and courses with the teachers with PUT and PATCH request
     * @param Request $request
     * @param $teacher_id
     * @param $course_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $teacher_id, $course_id)
    {
        $teacher = Teacher::find($teacher_id);
        if($teacher)
        {
            $course = Course::find($course_id);
            if($course)
            {
                $this->validateRequest($request);
                $course->title = $request->get('title');
                $course->description = $request->get('description');
                $course->value = $request->get('value');
                $course->teacher_id = $teacher_id;

                $course->save();
                return $this->createSuccessResponse("The course with id {$course->id} has been updated", 200);
            }
            return $this->createErrorResponse("Course does not exists with the given id", 404);
        }
        return $this->createErrorResponse("Teacher does not exists with the given id", 404);
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