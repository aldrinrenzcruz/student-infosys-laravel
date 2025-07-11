<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    // Create a default admin user
    User::factory()->admin()->create([
      'name' => 'Admin User',
      'email' => 'admin@example.com',
    ]);

    // Create a default regular user
    User::factory()->user()->create([
      'name' => 'Regular User',
      'email' => 'user@example.com',
    ]);

    User::factory(50)->create();
  }
}
