<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_code');
            $table->string('voucher_status');
            $table->datetime('used_at')->nullable();
            $table->datetime('expired_at')->nullable();
            $table->string('used_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
