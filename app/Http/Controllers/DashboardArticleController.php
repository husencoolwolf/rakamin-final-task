<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $articles = Article::with(['user', 'category'])->where("user_id", auth()->user()->id)->latest()->paginate(10);

    return view('dashboard.article.index', [
      "articles" => $articles
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view("dashboard.article.create", [
      'categories' => Category::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $DataTervalidasi = $request->validate([
      'title' => 'required|max:255',
      'category_id' => 'required',
      // image harus berupa image, file, dan maksimal 1024kb/ 1mb
      'image' => 'image|file|max:1024',
      'content' => 'required'
    ]);
    //karna image nullable maka bisa terjadi tidak ada image.
    //cek apakah ada file dari input image. jika ada, ambil gambar dan letakkan pada folder storage/article-image
    if ($request->file('image')) {
      // ddd($request);
      $DataTervalidasi['image'] = $request->file('image')->store('article-image');
    }
    //user id dari user sekarang
    $DataTervalidasi['user_id'] = auth()->user()->id;

    Article::create($DataTervalidasi);
    return redirect('/dashboard/articles')->with('success', 'New Article Has Been Added!!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Article $article)
  {
    return view("dashboard.article.show", [
      'article' => $article->load('category', 'user')
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Article $article)
  {
    return view('dashboard.article.edit', [
      'article' => $article,
      'categories' => Category::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Article $article)
  {
    //validasi data
    $rule = [
      'title' => 'required|max:255',
      'category_id' => 'required',
      'image' => 'image|file|max:1024',
      'content' => 'required'
    ];

    $dataTervalidasi = $request->validate($rule);

    //karna image nullable maka bisa terjadi tidak ada image.
    //cek apakah ada file dari input image. jika ada, ambil gambar dan letakkan pada folder storage/article-image

    if ($request->file('image')) {
      //cek jika ada image lama dalam suatu artikel.
      if ($request->oldImage) {
        //maka delete gambar lama tsb
        Storage::delete($request->oldImage);
      }
      $dataTervalidasi['image'] = $request->file('image')->store('article-image');
    }

    $dataTervalidasi['user_id'] = auth()->user()->id;

    Article::where('id', $article->id)->update($dataTervalidasi);

    return redirect('/dashboard/articles')->with('success', 'Article Successfully Updated!!!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    //cek jika ada image lama dalam suatu artikel.
    if ($article->image) {
      //maka delete gambar lama tsb
      Storage::delete($article->image);
    }
    Article::destroy($article->id);
    return redirect('/dashboard/articles')->with('success', 'Article Successfully Deleted');
  }
}
