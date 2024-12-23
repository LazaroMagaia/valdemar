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
        Schema::table('vagas', function (Blueprint $table) {
            $table->string('provincia')->nullable()->after('address');; // Coluna para província
        });
    }
    
    public function down(): void
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->dropColumn('provincia'); // Remover a coluna, caso a migration seja revertida
        });
    }
    
};
