<?php

use Illuminate\Database\Seeder;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        \App\Model\Teacher::truncate();
//        \App\Model\Student::truncate();
//        \App\Model\Course::truncate();
//        \Illuminate\Support\Facades\DB::table('course_student')->truncate();

//        factory(\App\Model\Teacher::class, 50)->create()->_id;
//        factory(\App\Model\Student::class, 500)->create()->_id;
//        factory(\App\Model\Course::class, 40)->create()->each(function($course)
//        {
//            $course->students()->attach(array_rand(range(1, 500)), 40);
//        });
        // $this->call('UsersTableSeeder');


    }
}
