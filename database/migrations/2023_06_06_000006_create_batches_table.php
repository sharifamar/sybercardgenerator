<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_serial_number');
            $table->datetime('expiry_date')->nullable();
            $table->integer('number_of_vouchers');
            $table->string('voucher_status')->nullable();
            $table->string('generated');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
