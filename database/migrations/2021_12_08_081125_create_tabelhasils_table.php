<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelhasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabelhasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('result_id')->constrained();
            $table->string('kode');
            $table->string('link')->nullable();
            $table->timestamp('tgl_buka')->useCurrent();
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
        Schema::dropIfExists('tabelhasils');
    }
}
