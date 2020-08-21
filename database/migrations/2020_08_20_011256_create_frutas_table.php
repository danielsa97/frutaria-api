<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frutas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_validade');
            $table->unsignedInteger('quantidade')->default(0)->nullable();
            $table->decimal('valor_unitario');
            $table->timestamps();
            $table->enum('status', ['A', 'I'])->default('A')->comment('A: Ativo, I: Inativo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frutas');
    }
}
