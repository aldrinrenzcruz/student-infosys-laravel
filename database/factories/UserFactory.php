<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  /**
   * The current password being used by the factory.
   */
  protected static ?string $password;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => fake()->name(),
      'role' => fake()->randomElement(['admin', 'customer']),
      'email' => fake()->unique()->safeEmail(),
      'email_verified_at' => now(),
      'password' => static::$password ??= Hash::make('password'),
      'remember_token' => Str::random(10),
      // 'photo' => fake()->optional(0.7)->imageUrl(640, 480, 'people', true, 'Faker'),
    ];
  }

  public function admin(): static
  {
    return $this->state(fn(array $attributes) => [
      'role' => 'admin',
    ]);
  }

  public function user(): static
  {
    return $this->state(fn(array $attributes) => [
      'role' => 'customer',
    ]);
  }
}
