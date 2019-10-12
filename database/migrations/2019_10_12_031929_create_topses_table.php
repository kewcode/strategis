<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nama");
            $table->string("kepadatan_penduduk");
            $table->string("aksebilitas");
            $table->string("lokasi");
            $table->string("jenis_usaha_sama");
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
        Schema::dropIfExists('topses');
    }
}
