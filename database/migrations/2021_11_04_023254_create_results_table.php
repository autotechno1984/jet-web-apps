<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->foreignId('market_id')->constrained();
            $table->integer('periode');
            $table->string('kode');
            $table->string('pasaran');
            $table->string('hasil')->nullable();
            $table->string('tipe');
            $table->string('jambuka');
            $table->string('status')->default(1);
            $table->string('posisi')->default(1);
            $table->time('jam_tutup');
            $table->timestamp('tgl_periode')->useCurrent();
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
        Schema::dropIfExists('results');
    }
}
