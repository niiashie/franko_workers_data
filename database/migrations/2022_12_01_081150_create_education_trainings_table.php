<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('bio_data_id');
            $table->string('number_of_academic_qualifications');
            $table->string('number_of_professional_training');
            $table->string('hobbies_special_interes');
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
        Schema::dropIfExists('education_trainings');
    }
}
