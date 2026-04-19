<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'student_id' => 'SID-' . fake()->unique()->numerify('####'),
            'full_name' => fake()->name(),
            'course' => fake()->randomElement([
                'BS Information Technology',
                'BS Computer Science',
                'BS Information Systems',
            ]),
            'year_level' => fake()->randomElement([
                '1st Year',
                '2nd Year',
                '3rd Year',
                '4th Year',
            ]),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
