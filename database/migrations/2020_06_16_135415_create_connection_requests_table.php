<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('requestor');
            $table->integer('requested');
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected'
            ])->default('pending');
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
        Schema::dropIfExists('connection_requests');
    }
}
