<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
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
            ->table('teachers', function (Blueprint $collection)
            {
                $collection->index('_id');
                $collection->string('name');
                $collection->string('address');
                $collection->integer('phone');
                $collection->string('profession');
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
            ->table('teachers', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
