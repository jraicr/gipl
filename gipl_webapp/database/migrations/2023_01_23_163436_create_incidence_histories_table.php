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
        Schema::create('incidence_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("incidence_id");
            $table->foreign("incidence_id")->references("id")->on("incidences")->onDelete("cascade");

            $table->unsignedBigInteger("state_id")->nullable();
            $table->foreign("state_id")->references("id")->on("states")->onDelete("set null");

            $table->unsignedBigInteger("student_id")->nullable();
            $table->foreign("student_id")->references("id")->on("students")->onDelete("set null");

            $table->unsignedBigInteger("peripheral_id")->nullable();
            $table->foreign("peripheral_id")->references("id")->on("peripherals")->onDelete("cascade");

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("set null");

            $table->string('description')->nullable();

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
        Schema::dropIfExists('incidence_histories');
    }
};
