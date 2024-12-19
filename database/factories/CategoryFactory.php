<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public $categories = [
        'Panettone',
        'Pandoro',
        'Pane Classico',
        'Pizza Napoletana',
        'Pizza Contemporanea',
        'Pane Internazionale',
        'Lievitati Salati',
        'Ricette Senza Lievito',
        'Ricette Gluten-Free',
        'Dolci Lievitati',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement($this->categories),
        ];
    }
}
