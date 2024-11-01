<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public $categories = [
        'News',
        'Sports',
        'Entertainment',
        'Business',
        'Technology',
        'Health',
        'Science',
        'Politics',
        'Travel',
        'Food',
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
