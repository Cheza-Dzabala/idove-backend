<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('slug')->unique();
            $table->longText('summary');
            $table->date('date_joined');
            $table->date('date_of_birth');
            $table->enum('gender', [
                'M',
                'F',
                'NB'
            ])->nullable();
            $table->string('country_of_residence');
            $table->string('city_of_residence');
            $table->string('nationality');
            $table->longText('pve_work');
            $table->string('phone_number');
            $table->enum('area_of_expertise', [
                'PM',
                'CW',
                'AR',
                'CR',
                'OT'
            ]);
            $table->string('physical_address');
            $table->enum('marital_status', [
                'Single',
                'Married',
                'Divorced',
                'Prefer Not To Say',
            ]);
            $table->string('religion')->nullable();
            $table->text('other_explained')->nullable();
            $table->longText('hobbies')->nullable();
            $table->longText('favourite_tv_shows')->nullable();
            $table->longText('favourite_movies')->nullable();
            $table->longText('favourite_music_bands')->nullable();
            $table->longText('favourite_books')->nullable();
            $table->longText('favourite_writers')->nullable();
            $table->longText('favourite_games')->nullable();
            $table->longText('other_interests')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
