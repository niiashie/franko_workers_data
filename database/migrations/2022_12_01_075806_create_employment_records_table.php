<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->id();
            $table->string('bio_data_id');
            $table->string('number_of_previous_work_place')->nullable();
            $table->string('present_job_title');
            $table->string('date_of_employment');
            $table->string('probation_period');
            $table->string('immediate_supervisor')->nullable();
            $table->string('employment_status');
            $table->string('career_objects');
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
        Schema::dropIfExists('employment_records');
    }
}
