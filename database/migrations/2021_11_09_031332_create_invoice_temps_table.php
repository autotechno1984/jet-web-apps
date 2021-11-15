<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_temps', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('result_id');
            $table->string('user_id');
            $table->string('kode');
            $table->string('posisi');
            $table->string('data');
            $table->decimal('amount',22,2);
            $table->decimal('hadiah',22,2)->default(0);
            $table->decimal('diskon', 22,2);
            $table->decimal('kei',22,2);
            $table->decimal('winlose',22,2);
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
        Schema::dropIfExists('invoice_temps');
    }
}
