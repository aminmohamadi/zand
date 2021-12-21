<?php


namespace Database\Factories;


use Illuminate\Support\Facades\Hash;
use Modules\AAA\Entities\Expert;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExpertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'personality_id' => 123456789,
            'password' => Hash::make(123456789),
            'phone' => $this->faker->phoneNumber,
            'status' => random_int(1,2),
            'gender'=>random_int(1,2),
        ];
    }
}
