<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidences', function (Blueprint $table) {
            $table->id();
            $table->string("description")->nullable(false);

            $table->unsignedBigInteger("state_id")->nullable();
            $table->foreign("state_id")->references("id")->on("states")->onDelete("set null");

            $table->unsignedBigInteger("student_id")->nullable();
            $table->foreign("student_id")->references("id")->on("students")->onDelete("set null");

            $table->unsignedBigInteger("peripheral_id")->nullable(false);
            $table->foreign("peripheral_id")->references("id")->on("peripherals")->onDelete("cascade");

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("set null");

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
        Schema::dropIfExists('incidences');
    }
};
