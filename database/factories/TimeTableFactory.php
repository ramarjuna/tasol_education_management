<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Faculty;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeTable>
 */
class TimeTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'faculty_id' => Faculty::inRandomOrder()->first()->id,
          'subject_id'  => Subject::inRandomOrder()->first()->id,
          'session_start_time' => $this->faker->time('H:i'),
          'session_stop_time' => $this->faker->time('H:i'),
          'duration' => $this->faker->numberBetween(1, 60),
        ];
    }
}
