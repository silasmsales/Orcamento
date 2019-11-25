<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_conta_id');
            $table->float('saldo', 10, 2)->default(0.00);
            $table->string('descricao', 128)->nullable();
            $table->string('descricao_detalhada', 1024)->nullable();
            $table->timestamps();
            $table->foreign('tipo_conta_id')->references('id')->on('tipo_contas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
