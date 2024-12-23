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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->enum('contract_type', ['Estágio', 'Temporário', 'Freelancer','Tempo_Integral','Part-Time'])
            ->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('company_id');
            $table->foreignId('category_id')->constrained('categories');
            $table->date('expiration_date')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
