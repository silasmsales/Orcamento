<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_despesa_id');
            $table->unsignedInteger('sub_tipo_despesa_id');
            $table->float('valor', 10, 2);
            $table->date('data')->nullable();
            $table->string('descricao', 128);
            $table->string('descricao_detalhada', 1024)->nullable();
            $table->timestamps();
            $table->foreign('tipo_despesa_id')->references('id')->on('tipo_despesas');
            $table->foreign('sub_tipo_despesa_id')->references('id')->on('sub_tipo_despesas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesas');
    }
}
