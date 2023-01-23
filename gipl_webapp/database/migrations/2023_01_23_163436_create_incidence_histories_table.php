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

            $table->unsignedBigInteger("state_id")->nullable();
            $table->foreign("state_id")->references("id")->on("states")->onDelete("set null");

            $table->unsignedBigInteger("incidence_id")->nullable(false);
            $table->foreign("incidence_id")->references("id")->on("incidences")->onDelete("cascade");

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
