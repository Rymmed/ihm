<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedInteger('coach_id');
            $table->foreign('coach_id', 'coach_fk_1001496')->references('id')->on('users');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id', 'course_fk_1001508')->references('id')->on('courses');
        });
    }
}
