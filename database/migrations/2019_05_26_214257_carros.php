<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carros extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');	        //varchar(255)
            $table->string('descricao');	//varchar(255)
            $table->string('url_foto');	    //varchar(255)
            $table->string('url_video');	//varchar(255)
            $table->string('latitude');	    //varchar(255)
            $table->string('longitude');	//varchar(255)
            $table->string('tipo');	        //varchar(255)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
