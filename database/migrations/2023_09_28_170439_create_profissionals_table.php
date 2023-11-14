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
        Schema::create('profissionals', function (Blueprint $table) {
            $table->integer('id', )->nullable(false);
            $table->string('nome', 80, 5)->unique()->nullable(false);
            $table->string('celular', 11, 10)->nullable(false);
            $table->string('e-mail', 120)->nullable(false);
            $table->string('cpf', 11, 11 )->nullable(false);
            $table->date('DatadeNascimento', )->nullable(false);
            $table->string('cidade', 120)->nullable(false);
            $table->string('estado', 2, 2)->nullable(false);
            $table->string('pais', 80)->nullable(false);
            $table->string('rua', 120)->nullable(false);
            $table->string('numero', 10)->nullable(false);
            $table->string('bairro', 100)->nullable(false);
            $table->string('cep', 8, 8)->nullable(false);
            $table->string('complemento', 150)->nullable(true);
            $table->string('senha', )->nullable(false);
            $table->decimal('salario', )->nullable(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionals');
    }
};
