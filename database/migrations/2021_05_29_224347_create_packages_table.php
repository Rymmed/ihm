<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('duration');
            $table->string('price');
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
