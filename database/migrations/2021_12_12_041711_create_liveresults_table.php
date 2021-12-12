<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liveresults', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('periode');
            $table->string('pasaran');
            $table->string('sh1');
            $table->string('sh2');
            $table->string('sh3');
            $table->string('sh4');
            $table->string('sh5');
            $table->string('sh6');
            $table->string('sh7');
            $table->string('sh8');
            $table->string('sh9');
            $table->string('sh10');
            $table->string('sh11');
            $table->string('sh12');
            $table->string('sh13');
            $table->string('sh14');
            $table->string('sh15');
            $table->string('status');
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
        Schema::dropIfExists('liveresults');
    }
}
