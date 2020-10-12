<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_organizers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('avatar');
            $table->longText('bio');
            $table->boolean('is_active');
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
        Schema::dropIfExists('website_organizers');
    }
}
