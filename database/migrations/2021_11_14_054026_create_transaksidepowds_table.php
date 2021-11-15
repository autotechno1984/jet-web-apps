<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksidepowdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksidepowds', function (Blueprint $table) {
            $table->id()->startingValue(500);
            $table->foreignId('user_id')->constrained();
            $table->string('kategori');
            $table->string('amount');
            $table->string('id_bank_detail');
            $table->string('user_bank_detail');
            $table->string('status');
            $table->string('catatan')->nullable();
            $table->string('approvedby')->nullable();
            $table->timestamp('date_approved')->nullable();
            $table->timestamp('data_request')->useCurrent();
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
        Schema::dropIfExists('transaksidepowds');
    }
}
