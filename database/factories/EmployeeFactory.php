<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$faker_company = Faker\Provider\en_US\Company::create();
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->jobTitle,
        ];
    }
}
