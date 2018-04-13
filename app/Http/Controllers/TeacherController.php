<?php

namespace App\Http\Controllers;

use App\Model\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();

        return $this->createSuccessResponse($teachers);
    }


//--------------------------------------------------------------------------------------------------------------------//


    /**
     * Create a new Teacher
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'profession' => 'required',
        ];

        $this->validate($request, $rules);

        $teacher = Teacher::create($request->all());

        return $this->createSuccessResponse("A teacher with id of {$teacher->_id} has been added to database", 201);
    }


//--------------------------------------------------------------------------------------------------------------------//


    public function show($id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            return $this->createSuccessResponse($teacher);
        }
        return $this->createErrorResponse("Teacher with id : {$id} does not exists", 404);
    }


//--------------------------------------------------------------------------------------------------------------------//


    public function update(Request $request, $teacher_id)
    {
        $teacher = Teacher::find($teacher_id);


        if($teacher)
        {
            $this->validateRequestRules($request);

            $teacher->name = $request->get('name');
            $teacher->phone = $request->get('phone');
            $teacher->address = $request->get('address');
            $teacher->profession = $request->get('profession');

            $teacher->save();

            return $this->createSuccessResponse("Teacher data has been updated successfully", 201);
        }
        return $this->createErrorResponse("The student specified does not exists", 404);
    }


//--------------------------------------------------------------------------------------------------------------------//


    /**
     * @param $teacher_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($teacher_id)
    {
        $teacher = Teacher::find($teacher_id);

        if($teacher)
        {
            $courses = $teacher->courses();
            var_dump($courses);
            if(sizeof($courses) > 0){
                return $this->createErrorResponse("You can not remove a teacher with active courses", 404);
            }
            $teacher->delete();
            return $this->createSuccessResponse("Teacher data has been deleted successfully", 200);
        }
        return $this->createErrorResponse("The teacher specified does not exists", 404);
    }


//--------------------------------------------------------------------------------------------------------------------//


    public function validateRequestRules($request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'profession' => 'required',
        ];
        $this->validate($request, $rules);
    }
}
