<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::all()->random()->id,
            'doctor_id' => Doctor::all()->random()->id,
            'schedule' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];

    }
}
