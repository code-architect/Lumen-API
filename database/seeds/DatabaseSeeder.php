<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Model\Teacher::truncate();
        \App\Model\Student::truncate();
        \App\Model\Course::truncate();
        DB::table('course_student')->truncate();
//        \Illuminate\Support\Facades\DB::table('course_student')->truncate();

        factory(\App\Model\Teacher::class, 50)->create();
        factory(\App\Model\Student::class, 500)->create();
        factory(\App\Model\Course::class, 40)->create()->each(function($course)
        {
            $course->students()->attach(array_rand(range(1, 500), 40));
        });

    }
}
