<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubTipoDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tipo_despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_despesas_id');
            $table->string('descricao', 128)->nullable();
            $table->string('descricao_detalhada', 1024)->nullable();
            $table->timestamps();
            $table->foreign('tipo_despesas_id')->references('id')->on('tipo_despesas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_tipo_despesas');
    }
}
