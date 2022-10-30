<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $category = Category::with(['user', 'article'])->orderByRaw("user_id = '" . auth()->user()->id . "' DESC")->get();

    return view('dashboard.category.index', [
      'categories' => $category
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.category.create', []);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //Data nama unique max 40 karakter dan hanya boleh alphabet (pakai regex)
    $dataTervalidasi = $request->validate([
      'name' => 'required|unique:categories|max:40|regex:/^[a-zA-Z ]+$/'
    ]);

    $dataTervalidasi['user_id'] = auth()->user()->id;
    Category::create($dataTervalidasi);

    return redirect('/dashboard/categories')->with('success', 'New Category Created!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //Article dengan relasi category dan user, dimana user_id = id user ter authentikasi, dan category_id = category id yang dipilih.
    $articles = Article::with(['category', 'user'])->where([['user_id', auth()->user()->id], ['category_id', $category->id]])->paginate(10);
    return view('dashboard.category.show', [
      'category' => $category,
      'articles' => $articles
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('dashboard.category.edit', [
      'category' => $category
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    //kalau tidak sama seperti semula. Jalankan update, kalau tidak, redirect saja.
    if ($request->name != $category->name) {
      $dataTervalidasi = $request->validate([
        'name' => 'required|max:40|unique:categories|regex:/^[a-zA-Z ]+$/'
      ]);

      Category::where('id', $category->id)->update($dataTervalidasi);
      return redirect('/dashboard/categories')->with('success', 'Category Successfully Updated!!!');
    }
    return redirect('/dashboard/categories');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
  }
}
