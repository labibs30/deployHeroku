<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'p_name' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'p_excerpt' => $this->faker->paragraph(),
            // 'body'=>'<p>' . implode('<p></p>',$this->faker->paragraphs(mt_rand(5,10))).'</p>',
            'p_description' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'p_price' => $this->faker->randomDigit,
        ];
    }
}
