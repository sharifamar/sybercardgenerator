<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('redeem_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_code');
            $table->string('requester');
            $table->string('external_reference')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
