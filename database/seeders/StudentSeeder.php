<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
  public function run()
  {
    Student::factory()->bsit()->count(8)->create();
    Student::factory()->bscs()->count(4)->create();
    Student::factory()->bsba()->count(3)->create();
    Student::factory()->count(2)->create();
  }
}
