<?php

namespace Database\Factories\Domain\User;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'document' => $this->faker->randomNumber(9),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => $this->faker->randomElement(\App\Domain\User\User::TYPES),
            'wallet' => $this->faker->randomFloat(6),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
