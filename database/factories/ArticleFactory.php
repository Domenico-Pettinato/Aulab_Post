<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public $Articles = [
        'Laravel',
        'PHP',
        'JavaScript',
        'Vue.js',
        'React.js',
        'Angular',
        'Svelte',
        'Flutter',
        'Dart',
        'Kotlin',
        'Swift',
        'Ruby',
        'Python',
        'Java',
        'C++',
        'C#',
        'Go',
        'Node.js',
        'Express.js',
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement($this->Articles),
            'body' => $this->faker->paragraph(3),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
