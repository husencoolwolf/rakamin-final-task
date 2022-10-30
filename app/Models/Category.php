<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  // 1 categiory bisa memiliki banyak article
  public function article()
  {
    return $this->hasMany(Article::class);
  }
  // 1 category dimiliki oleh 1 user
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
