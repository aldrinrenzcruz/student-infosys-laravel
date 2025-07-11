<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->sentence(5, true),
      'description' => $this->faker->paragraphs(3, true),
      'country_id' => $this->faker->numberBetween(1, 10),
      'stocks' => $this->faker->numberBetween(0, 100),
      'amount' => $this->faker->randomFloat(2, 10, 500),
      'photo' => $this->faker->imageUrl(300, 400, 'books', true),
    ];
  }
}
