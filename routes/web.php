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



//todo
//jenssegers/mongodb-session
//jenssegers/mongodb-sentry
