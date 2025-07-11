<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
  public function definition()
  {
    return [
      'name' => $this->faker->name(),
      'course' => $this->faker->randomElement(['BSIT', 'BSCS', 'BSBA', 'BSEE', 'BSCE']),
    ];
  }

  // State for BSIT students specifically
  public function bsit()
  {
    return $this->state(function (array $attributes) {
      return [
        'course' => 'BSIT',
      ];
    });
  }

  // State for BSCS students specifically
  public function bscs()
  {
    return $this->state(function (array $attributes) {
      return [
        'course' => 'BSCS',
      ];
    });
  }

  // State for BSBA students specifically
  public function bsba()
  {
    return $this->state(function (array $attributes) {
      return [
        'course' => 'BSBA',
      ];
    });
  }
}
