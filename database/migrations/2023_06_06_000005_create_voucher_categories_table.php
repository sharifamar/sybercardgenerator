<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_name');
            $table->float('amount', 15, 2);
            $table->string('currency')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
