<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doc_documentos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('DOC_ID');
            $table->string('DOC_NOMBRE');
            $table->integer('DOC_CODIGO');
            $table->string('DOC_CONTENIDO');

            $table->bigInteger('DOC_ID_PROCESO')->unsigned();
            $table->bigInteger('DOC_ID_TIPO')->unsigned();
            $table->timestamps();

            $table->foreign('DOC_ID_PROCESO')->references('PRO_ID')->on('pro_procesos')->onDelete('cascade');
            $table->foreign('DOC_ID_TIPO')->references('TIP_ID')->on('tip_tipo_docs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documentos');
    }
};
