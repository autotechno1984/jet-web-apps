<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputManualAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_manual_admins', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('adminid');
            $table->string('invoiceid');
            $table->string('nonota');
            $table->timestamp('dateinput');
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
        Schema::dropIfExists('input_manual_admins');
    }
}
