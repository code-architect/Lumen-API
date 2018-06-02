<?php

namespace App\Http\Controllers;

use App\Model\Course;
use App\Model\Student;

class CourseStudentController extends Controller{

    public function index($id)
    {
        $course = Course::find($id);

        if($course)
        {
            $students = $course->students;
            return $this->createSuccessResponse($students, 200);
        }
        return $this->createErrorResponse("Does not exists a course with the given id", 404);
    }

    public function store($course_id, $student_id)
    {
        $course = Course::find($course_id);
        if($course)
        {
            $student = Student::find($student_id);
            if($student)
            {
                if($course->students()->find($student->id))
                {
                    return $this->createErrorResponse("The student with ID: {$student->id} already doing this course", 409);
                }
                $course->students()->attach($student->id);
                return $this->createSuccessResponse("The student with ID: {$student->id} added to the course", 201);
            }
            return $this->createErrorResponse("Does not exists a student with the given id", 404);
        }
        return $this->createErrorResponse("Does not exists a course with the given id", 404);
    }

    public function destroy($course_id, $student_id)
    {
        $course = Course::find($course_id);
        if($course)
        {
            $student = Student::find($student_id);
            if($student)
            {
                if(!$course->students()->find($student->id))
                {
                    return $this->createErrorResponse("The student with ID: {$student->id} does not exist in this course", 404);
                }
                $course->students()->detach($student->id);
                return $this->createSuccessResponse("The student with ID: {$student->id} has been removed from this course", 200);
            }
            return $this->createErrorResponse("Does not exists a student with the given id", 404);
        }
        return $this->createErrorResponse("Does not exists a course with the given id", 404);
    }


}