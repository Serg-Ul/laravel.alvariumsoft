<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fio' => 'FIO',
            'birthday_date' => '7/07/2007',
            'position' => 'Receptionist',
            'salary' => '2000',
            'work_hours' => 8,
        ];
    }
}
