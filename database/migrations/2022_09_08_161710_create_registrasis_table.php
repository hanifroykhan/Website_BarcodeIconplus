<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('no_spa');
            $table->text('user');
            $table->text('sid');
            $table->text('layanan');
            $table->text('tikor');
            $table->text('namaMitra');
            $table->text('picMitra');
            $table->text('fatKode');
            $table->text('portFAT');
            $table->text('idle');
            $table->text('tikorFAT');
            $table->text('olt');
            $table->text('panjangKabel');
            $table->text('snONT');
            $table->text('macONT');
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
        Schema::dropIfExists('registrasis');
    }
}
