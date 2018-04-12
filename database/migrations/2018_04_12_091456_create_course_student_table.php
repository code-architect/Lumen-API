<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $connection = 'mongodb';

    public function up()
    {
        Schema::connection($this->connection)
            ->table('course_student', function (Blueprint $collection)
            {

                $collection->index('_id');
                $collection->integer('course_id')->unsigned();
                $collection->foreign('course_id')->references('_id')->on('teachers')->onDelete('cascade');
                $collection->integer('teacher_id')->unsigned();
                $collection->foreign('teacher_id')->references('_id')->on('teachers')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
            ->table('course_student', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
