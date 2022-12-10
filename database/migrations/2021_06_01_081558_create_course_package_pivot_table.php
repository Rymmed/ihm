<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCoursePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_package', function (Blueprint $table) {
            $table->unsignedInteger('package_id');
            $table->foreign('package_id', 'package_id_fk_1001484')->references('id')->on('packages')->onDelete('cascade');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id', 'course_id_fk_1001484')->references('id')->on('courses')->onDelete('cascade');
        });
    }

}
