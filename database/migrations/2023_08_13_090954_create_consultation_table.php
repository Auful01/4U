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
        Schema::create('consultation', function (Blueprint $table) {
            $table->id();
            $table->string("doctor_id")->nullable();
            $table->string("user_id")->nullable();
            $table->string("category_id")->nullable();
            $table->string("schedule")->nullable();
            $table->text("complaints")->nullable();
            $table->text("result")->nullable();
            $table->string("status")->nullable();
            $table->string("image")->nullable();
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
        Schema::dropIfExists('consultation');
    }
};
