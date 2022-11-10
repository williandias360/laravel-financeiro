<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Movimento', function (Blueprint $table) {
            $table->id("CodigoMovimento");
            $table->foreignId("CodigoTipoMovimento")->constrained("TipoMovimento", "CodigoTipoMovimento");
            $table->foreignId("user_id")->constrained("users");
            $table->string("Descricao", 255);
            $table->decimal("Valor", 12, 2);
            $table->date("DataMovimento");
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
        Schema::dropIfExists('Movimento');
    }
};
