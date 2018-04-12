<?php

namespace App\Http\Controllers;

use App\Model\Course;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();

        return $this->createSuccessResponse($courses);
    }

    public function show($id)
    {
        $course = Course::find($id);
        if($course){
            return $this->createSuccessResponse($course);
        }
        return $this->createErrorResponse("The course id : {$id} does not exists", 404);

    }


}
