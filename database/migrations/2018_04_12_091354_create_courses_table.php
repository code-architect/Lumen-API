<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
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
            ->table('courses', function (Blueprint $collection)
            {
                $collection->index('_id');
                $collection->string('name');
                $collection->string('title');
                $collection->string('description');
                $collection->integer('value');
                $collection->integer('teacher_id')->unsigned();
                $collection->foreign('teacher_id')->references('_id')->on('teachers')->onDelete('cascade');
                $collection->timestamps();
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
            ->table('courses', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
