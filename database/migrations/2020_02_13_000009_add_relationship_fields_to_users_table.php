<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_1001550')->references('id')->on('courses');
            $table->unsignedInteger('package_id')->nullable();
            $table->foreign('package_id', 'package_fk_1001551')->references('id')->on('packages');
        });
    }
}
