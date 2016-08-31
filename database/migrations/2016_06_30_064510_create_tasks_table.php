<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                  ->references('id')->on('projects')
                  ->onDelete('cascade');
            $table->string('name');
            $table->timestamp('start')->default('0000-00-00 00:00:00');  
            $table->timestamp('pause')->default('0000-00-00 00:00:00');
            $table->timestamp('resume')->default('0000-00-00 00:00:00');
            $table->timestamp('stop')->default('0000-00-00 00:00:00');
            $table->integer('loss')->default(0);
            $table->integer('total')->default(0);
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
