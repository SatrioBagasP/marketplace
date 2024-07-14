<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_product' => $this->faker->sentence(mt_rand(2, 8)),
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'desc' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
            'toko_id' => mt_rand(1, 2),
            'category_id' => mt_rand(1, 5),
            'image' => 'default-product-image.png',
        ];
    }
}
