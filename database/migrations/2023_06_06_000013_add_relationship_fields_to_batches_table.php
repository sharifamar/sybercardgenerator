<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBatchesTable extends Migration
{
    public function up()
    {
        Schema::table('batches', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('voucher_id', 'voucher_fk_8564362')->references('id')->on('voucher_categories');
        });
    }
}
