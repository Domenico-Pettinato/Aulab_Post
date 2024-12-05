<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea utenti, categorie, articoli e tag
        User::factory(10)->create();
        Category::factory()->count(10)->create();
        $articles = Article::factory()->count(10)->create();
        $tags = Tag::factory()->count(10)->create();

        // Associa tag casuali agli articoli
        foreach ($articles as $article) {
            // Scegliamo un numero casuale di tag da associare all'articolo
            $randomTags = $tags->random(rand(1, 3)); // Associa da 1 a 3 tag per ogni articolo
            $article->tags()->attach($randomTags);
        }
    }
}

