<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brgy_id'       =>  $this->faker->randomNumber,
            'evacuation_id' =>  $this->faker->randomNumber,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'number'        => $this->faker->randomNumber,
            'role'          => $this->faker->randomElement(['admin', 'user']),
            'password'      => bcrypt('secret'),
            'remember_token' => Str::random(10),
        ];
    }
}
