<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('handphone')->unique();
            $table->string('alamat')->nullable();
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kodekota')->unique();
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('rtrw');
            $table->string('point')->default(0);
            $table->string('kredit')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
}
