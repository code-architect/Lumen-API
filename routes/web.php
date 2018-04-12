<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
        //$user = \App\Test::all();
        $user = \App\Test::where('_id','=','5ace22bdda939d0d31c989b0')->first();

        echo "<pre>";
        dd($user);
});

$router->get('/teachers', 'TeacherController@index');
$router->post('/teachers', 'TeacherController@store');
$router->get('/teachers/{teachers}', 'TeacherController@show');
$router->put('/teachers/{teachers}', 'TeacherController@update');
$router->patch('/teachers/{teachers}', 'TeacherController@update');
$router->delete('/teachers/{teachers}', 'TeacherController@destroy');

$router->get('/students', 'StudentController@index');
$router->post('/students', 'StudentController@store');
$router->get('/students/{students}', 'StudentController@show');
$router->put('/students/{students}', 'StudentController@update');
$router->patch('/students/{students}', 'StudentController@update');
$router->delete('/students/{students}', 'StudentController@destroy');

$router->get('/courses', 'CourseController@index');
$router->get('/courses/{courses}', 'CourseController@show');

$router->get('/teachers/{teachers}/courses', 'TeacherCourseController@index');
$router->post('/teachers/{teachers}/courses', 'TeacherCourseController@store');
$router->put('/teachers/{teachers}/courses/{courses}', 'TeacherCourseController@update');
$router->patch('/teachers/{teachers}/courses/{courses}', 'TeacherCourseController@update');
$router->delete('/teachers/{teachers}/courses/{courses}', 'TeacherCourseController@destroy');

$router->get('/courses/{courses}/students', 'CourseStudentController@index');
$router->post('/courses/{courses}/students/{students}', 'CourseStudentController@store');
$router->delete('/courses/{courses}/students/{students}', 'CourseStudentController@destroy');


//todo
//jenssegers/mongodb-session
//jenssegers/mongodb-sentry
