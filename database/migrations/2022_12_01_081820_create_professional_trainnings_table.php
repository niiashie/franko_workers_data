<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalTrainningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_trainnings', function (Blueprint $table) {
            $table->id();
            $table->string('education_trainings_id');
            $table->string('instituition');
            $table->string('year');
            $table->string('course');
            $table->string('location');
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
        Schema::dropIfExists('professional_trainnings');
    }
}
