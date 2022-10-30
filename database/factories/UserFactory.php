<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      //name pakai faker name
      'name' => $this->faker->name(),
      //email pakai faker email unik
      'email' => $this->faker->unique()->email(),
      //email_verified_at pakai now untuk return waktu sekarang
      'email_verified_at' => now(),
      //password pakai class Hash dari laravel dan password semua akun akan 123
      'password' => Hash::make('123'),
    ];
  }
}
