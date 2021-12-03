<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained();
            $table->foreignId('result_id')->constrained();
            $table->foreignID('user_id')->constrained();
            $table->string('kode');
            $table->string('posisi');
            $table->string('data');
            $table->decimal('amount',22,2);
            $table->decimal('hadiah',22,2)->default(0);
            $table->decimal('diskon', 22,2);
            $table->decimal('kei',22,2);
            $table->decimal('winlose',22,2);
            $table->decimal('total', 22,2);
            $table->softDeletes();
            $table->string('is_win')->default(0);
            $table->string('status')->default(1);
            $table->string('tgl_beli');
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
        Schema::dropIfExists('invoice_details');
    }
}
