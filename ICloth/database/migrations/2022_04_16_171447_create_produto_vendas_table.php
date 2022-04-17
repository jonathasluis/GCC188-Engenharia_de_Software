<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_vendas', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('venda_id')
                ->constrained('vendas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_vendas');
    }
}
