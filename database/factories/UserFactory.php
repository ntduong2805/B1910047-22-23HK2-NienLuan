<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
        $gender = $this->faker->randomElement(['male', 'female', 'others']);
        
        if($gender == "female")
            $avatar = $this->faker->randomElement(['girl.png', 'girl-1.png', 'girl-2.png']);
        else
            $avatar = $this->faker->randomElement(['boy.png', 'boy-1.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png']);
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $gender,
            'phone' => $this->faker->isbn10(),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'avatar' => $avatar,
            'about' => $this->faker->text($maxNbChars = 200),
            'role' => 'customer',
            'status' => TRUE,
            'remember_token' => Str::random(10),
        ];
    }
}
