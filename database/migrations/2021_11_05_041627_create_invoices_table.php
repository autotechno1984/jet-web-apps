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
            $table->decimal('amount',22,2);
            $table->decimal('total',22,2);
            $table->decimal('diskon',22,2);
            $table->decimal('winLose');
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
