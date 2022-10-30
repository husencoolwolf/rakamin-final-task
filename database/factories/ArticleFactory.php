<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      //factory title menggunakan faker sentence/kalimat
      'title' => $this->faker->sentence(mt_rand(2, 8)),
      //factory content menggunakan faker paragraphs/paragraf
      /*paragraf di jadikan variable collect dan di mapping agar bentuknya
      <p> Paragraf <p> disetiap paragraf yang dibuat
      */
      'content' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function ($paragraph) {
        return "<p>$paragraph</p>";
      })->implode(""),
      //factory user_id angka random 1-5 karena ada 5 user 
      'user_id' => mt_rand(1, 5),
      //factory category_id angka random 1-3 karena ada 3 category 
      'category_id' => mt_rand(1, 3)
    ];
  }
}
