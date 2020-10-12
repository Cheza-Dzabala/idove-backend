<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->longText('short_summary');
            $table->longText('description');
            $table->string('country');
            $table->string('webiste')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->integer('user_id');
            $table->string('tags');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('projects');
    }
}
