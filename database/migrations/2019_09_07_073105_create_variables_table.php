<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("kabupaten_kota",100)->nullable();
            $table->string("kecamatan",100)->nullable();
            $table->string("nama")->nullable();
            $table->string("kategori")->nullable();
            $table->string("alamat")->nullable();
            $table->float("lintang")->nullable();
            $table->float("bujur")->nullable();
            $table->integer("jumlah")->nullable();
            $table->boolean("active")->default(1);
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
        Schema::dropIfExists('variables');
    }
}
