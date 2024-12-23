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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('address')->nullable(); // Endereço
            $table->string('phone')->nullable(); // Telefone
            $table->text('bio')->nullable(); // Bio ou descrição do usuário
            $table->string('cv')->nullable(); // Campo para armazenar o currículo (arquivo)
            $table->string('profile_picture')->nullable(); // Foto de perfil
            $table->string('gender')->nullable(); // Gênero
            $table->string('birthdate')->nullable(); // Data de nascimento
            $table->string('province')->nullable(); // Província
            $table->string('city')->nullable(); // Cidade
            $table->enum('education_level', ['Básico', 'Médio', 'Técnico', 
                'Licenciatura', 'Mestrado','Doutorado'
            ])->nullable();
            $table->boolean('profile_complete')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
