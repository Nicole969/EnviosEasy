<?php

use App\Models\cliente;
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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('slug');
            $table->string('codigo')->nullable();
            $table->string('apellido')->nullable();
            $table->integer('dni')->unique();
            $table->integer('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('fechaForTexto')->nullable();
            $table->enum('estado',['1','0'])->default('1');
            $table->enum('servicio',['corte', 'cote_temporal',
                'activo','sin_instalacion','reconexion','otro'])->default('activo');
            $table->enum('concepto',['unico','mensual','anual'])->default('mensual');

            $table->unsignedBigInteger('otro_id')->nullable();
            $table->foreign('otro_id')->references('id')->on('otros')->onDelete('set null');
            
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
};
