<?php

use App\Models\User;
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
        // Aggiunge le colonne alla tabella users
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->after('email')->nullable()->default(false);
            $table->boolean('is_revisor')->after('is_admin')->nullable()->default(false);
            $table->boolean('is_writer')->after('is_revisor')->nullable()->default(false);
        });

        // Crea tre utenti
        User::create([
            'name' => 'Admin',
            'email' => 'admin@aulabpost.it',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Revisor',
            'email' => 'revisor@aulabpost.it',
            'password' => bcrypt('12345678'),
            'is_revisor' => true,
        ]);

        User::create([
            'name' => 'Writer',
            'email' => 'writer@aulabpost.it',
            'password' => bcrypt('12345678'),
            'is_writer' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Elimina gli utenti creati
        User::where('email', 'admin@aulabpost.it')->delete();
        User::where('email', 'revisor@aulabpost.it')->delete();
        User::where('email', 'writer@aulabpost.it')->delete();

        // Rimuove le colonne dalla tabella users
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });
    }
};

