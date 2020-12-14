<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nascimento');
            $table->char('sexo', 1);
            $table->integer('cep')->nullable();
            $table->string('endereco', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->char('estado', 2)->nullable();
            $table->string('cidade', 50)->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
