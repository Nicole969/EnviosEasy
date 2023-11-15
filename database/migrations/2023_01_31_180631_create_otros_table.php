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
        Schema::create('otros', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->integer('dni')->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('estadocd',['0', '1'])->default('1');
            $table->enum('tipo_costo',['Agua', 'Desague','Reconexion'
            ,'Medidor','Visita tecnica','Anexo de Agua','Pileta'])->default('Agua');
            $table->integer('cant')->nullable();
            $table->integer('cadU')->nullable();
            $table->integer('opcional')->nullable();
            $table->integer('cliente')->nullable();
            $table->integer('opcionalN')->nullable();
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
        Schema::dropIfExists('otros');
    }
};
