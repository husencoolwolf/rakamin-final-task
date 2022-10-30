<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    //buat factory 4 user
    User::factory(4)->create();
    //satu user costum dengan data berikut
    User::create([
      'name' => "user",
      'email' => "user@gmail.com",
      'email_verified_at' => now(),
      'password' => Hash::make('123'),
    ]);
    //buat factory article 20 article
    Article::factory(20)->create();
    //dibawah adalah category dengan user_id random sesuai jumlah user yang saya buat diatas
    Category::create([
      'name' => 'Web Programming',
      'user_id' => mt_rand(1, 5)
    ]);
    Category::create([
      'name' => 'Gaming',
      'user_id' => mt_rand(1, 5)
    ]);
    Category::create([
      'name' => 'Android Programming',
      'user_id' => mt_rand(1, 5)
    ]);
  }
}
