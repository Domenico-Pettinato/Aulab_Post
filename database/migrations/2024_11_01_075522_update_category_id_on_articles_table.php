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
        Schema::table('articles', function (Blueprint $table) {
            // Rimuove temporaneamente la chiave esterna
            $table->dropForeign(['category_id']);
            
            // Modifica la colonna `category_id` per renderla non nullable
            $table->unsignedBigInteger('category_id')->nullable(false)->change();
            
            // Aggiunge nuovamente il vincolo di chiave esterna con comportamento di eliminazione in CASCADE
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Rimuove la chiave esterna per rollback
            $table->dropForeign(['category_id']);
            
            // Cambia di nuovo la colonna `category_id` a nullable
            $table->unsignedBigInteger('category_id')->nullable()->change();
            
            // Aggiunge nuovamente il vincolo di chiave esterna con comportamento di eliminazione SET NULL
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }
};

