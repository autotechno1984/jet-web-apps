<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id()->startingValue(100);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('result_id')->constrained();
            $table->string('total');
            $table->string('diskon');
            $table->string('winLose');
            $table->string('status');
            $table->timestamp('tgl_invoice')->useCurrent();
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
        Schema::dropIfExists('invoices');
    }
}
