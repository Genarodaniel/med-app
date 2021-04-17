<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'crm' => $this->faker->numerify('#########') . '/SP',
            'speciality' => $this->faker->randomElement(['Odontologia', 'Psiquiatria', 'Pediatria'])[0],
            'gender' =>$this->faker->randomElement(['M', 'F'])[0]
        ];
    }
}
