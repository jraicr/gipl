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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("surname");
            $table->string("group_num");

            $table->unsignedBigInteger("scholar_group_id")->nullable();
            $table->foreign("scholar_group_id")->references("id")->on("scholar_groups")->onDelete("set null");

            $table->unsignedBigInteger("computer_id")->nullable();
            $table->foreign("computer_id")->references("id")->on("computers")->onDelete("set null");

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
        Schema::dropIfExists('students');
    }
};
