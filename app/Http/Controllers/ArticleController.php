<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function index()
  {
    $article = Article::with(['user', 'category'])->latest()->paginate(7);

    return view('articles', [
      "active" => "article",
      "article" => $article
    ]);
  }

  public function detail($id)
  {
    $article = Article::where('id', $id)->first();
    if (!$article) {
      return redirect("/");
    }

    return view('article', [
      "active" => 'article',
      'article' => $article
    ]);
  }
}
