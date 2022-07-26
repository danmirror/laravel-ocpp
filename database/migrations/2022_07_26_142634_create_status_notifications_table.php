<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('idHW');
            $table->string('connectorId')->nullable();
            $table->string('errorCode')->nullable();
            $table->string('info')->nullable();
            $table->string('status')->nullable();
            $table->string('vendorId')->nullable();
            $table->string('vendorErrorCode')->nullable();
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
        Schema::dropIfExists('status_notifications');
    }
}
