<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id');
            $table->foreign('member_id', 'member_fk_1001497')->references('id')->on('users');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id', 'package_fk_1001552')->references('id')->on('packages');
            $table->boolean('state')->default(0);
            $table->timestamp('fin');
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
        Schema::dropIfExists('subscriptions');
    }
}
