<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function ($table) {
            $table->bigIncrements('id');
            $table->string('nomeVendedor');
            $table->string('nomeDaEmpresa')->nullable();
            $table->string('nomeDoContato');
            $table->bigInteger('numero');
            $table->string('email');
            $table->date('dataContato')->nullable();
            $table->date('dataValidade')->nullable();
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
        Schema::dropIfExists('contatos');
    }
}
