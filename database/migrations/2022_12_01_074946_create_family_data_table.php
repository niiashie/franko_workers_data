<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_data', function (Blueprint $table) {
            $table->id();
            $table->string('bio_data_id');
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('father_name');
            $table->string('father_is_deceased');
            $table->string('mother_name');
            $table->string('mother_is_deceased');
            $table->string('number_of_children');
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
        Schema::dropIfExists('family_data');
    }
}
