<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
  use HasFactory;

  protected $guarded = ['id'];
  //1 article dimiliki 1 category
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  //1 article dimiliki 1 user
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
