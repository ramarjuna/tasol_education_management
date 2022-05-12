<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\FacultySeeder;
use Database\Seeders\TimeTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(FacultySeeder::class);
      // $this->call(SubjectSeeder::class);
      $this->call(TimeTableSeeder::class);
    }
}
