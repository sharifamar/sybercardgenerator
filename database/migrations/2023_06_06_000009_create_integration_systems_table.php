<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrationSystemsTable extends Migration
{
    public function up()
    {
        Schema::create('integration_systems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('system_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('system_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
