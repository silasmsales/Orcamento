<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saidas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('conta_id')->nullable();
            $table->unsignedInteger('despesa_id');
            $table->float('valor', 10, 2);
            $table->date('data');
            $table->string('descricao', 128)->nullable();
            $table->string('descricao_detalhada', 1024)->nullable();
            $table->timestamps();
            $table->foreign('conta_id')->references('id')->on('contas');
            $table->foreign('despesa_id')->references('id')->on('despesas');
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saidas');
    }
}
