<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $articles = [
        'Pane Classico' => [
            'Come Preparare un Pane Bianco Morbido e Soffice',
            'Ricetta del Pane Integrale: Gusto e Salute',
            'Pane ai 5 Cereali: Un Classico con un Tocco Rustico'
        ],
        'Pane Speciale' => [
            'Pane al Rosmarino: Profumo e Sapore',
            'Pane alla Curcuma con Semi di Girasole',
            'Pane al Cioccolato e Noci per le Colazioni Speciali'
        ],
        'Pane Regionale e Tradizionale' => [
            'Il Pane di Altamura: La Tradizione della Puglia',
            'Come Fare il Pane Toscano Senza Sale',
            'Ricetta del Pane Carasau Sardo Fatto in Casa'
        ],
        'Pane Internazionale' => [
            'La Baguette Francese Perfetta: Croccante e Soffice',
            'Naan Indiano: Il Pane Ideale per Accompagnare Curry',
            'Pita Fatta in Casa con Farina Integrale'
        ],
        'Pane Dolce' => [
            'Pan Brioche Morbido al Latte',
            'Pane Dolce con Uvetta e Cannella',
            'Hot Cross Buns: I Panini Dolci Speziati'
        ],
        'Lievitati Salati' => [
            'Focaccia Genovese con Olio Extravergine',
            'Panini al Latte Soffici per Hamburger',
            'Pane Ripieno con Verdure Grigliate'
        ],
        'Ricette Senza Lievito' => [
            'Soda Bread: Il Pane Veloce Senza Lievitazione',
            'Flatbread in Padella: Una Soluzione Pratica e Deliziosa',
            'Pane Azzimo Croccante con Farina Integrale'
        ],
        'Ricette Gluten-Free' => [
            'Pane Senza Glutine con Farina di Riso e Teff',
            'Crackers Croccanti Gluten-Free al Rosmarino',
            'Panini Morbidi Senza Glutine per Tutti i Giorni'
        ],
        'Dolci Lievitati' => [
            'Panettone Fatto in Casa con Lievito Madre',
            'Colomba Pasquale Tradizionale',
            'Brioche Soffici con Crema Pasticcera'
        ],
        'Pane Fatto in Casa con Attrezzature Semplici' => [
            'Pane in Pentola: Tecnica Facile e Risultato Perfetto',
            'Pane con la Macchina del Pane: Guida e Ricette',
            'Come Fare il Pane in Padella: Semplicità e Gusto'
        ],
        'Ricette per Occasioni Speciali' => [
            'Pane Decorativo a Forma di Treccia per la Tavola di Natale',
            'Panini Farciti per Buffet e Feste',
            'Pane per Pasqua: La Torta di Pane Rustica'
        ]
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = $this->faker->randomElement(array_keys($this->articles));
        $title = $this->faker->randomElement($this->articles[$category]);

        return [
            'title' => $title,
            'body' => $this->faker->paragraph(3),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

