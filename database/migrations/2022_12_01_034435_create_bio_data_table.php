<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBioDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio_data', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('other_names');
            $table->string('previous_names')->nullable();
            $table->string('date_of_birth');
            $table->string('nationality');
            $table->string('home_town');
            $table->string('region');
            $table->string('gender');
            $table->string('house_number')->nullable();
            $table->string('city_town')->nullable();
            $table->string('digital_address')->nullable();
            $table->string('street_name')->nullable();
            $table->string('nearest_landmark')->nullable();
            $table->string('post_address')->nullable();
            $table->string('email_address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('social_security_number');
            $table->string('bank');
            $table->string('branch_name');
            $table->string('account_name');
            $table->string('languages_spoken');
            $table->string('physical_disability');
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
        Schema::dropIfExists('bio_data');
    }
}
