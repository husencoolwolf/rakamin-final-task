<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
    $category = Category::all();

    return view('categories', [
      "active" => 'category',
      'categories' => $category
    ]);
  }

  public function detail($id)
  {
    $article = Article::latest()->where('category_id', $id)->get();

    return view('articles', [
      'active' => 'category',
      'article' => $article
    ]);
  }
}
