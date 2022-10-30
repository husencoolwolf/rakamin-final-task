<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Article;
use App\Helper\APIFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //ambil semua article / post yang dimiliki user
    $article = Article::latest()->where("user_id", auth()->user()->id)->paginate(5);
    //jika gagal ambil article
    if (!$article) {
      return APIFormatter::create(404, "Cant get your data!, Something went wrong!");
    }

    return APIFormatter::create(200, "Success", [
      'posts' => $article
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $dataTervalidasi = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
      'image' => 'nullable',
      'category_id' => 'required'
    ]);

    $dataTervalidasi['user_id'] = auth()->user()->id;
    $input = Article::create($dataTervalidasi);
    if (!$input) {
      return APIFormatter::create(404, "Failed to input");
    }
    return APIFormatter::create(200, "Success", [
      'post' => $input
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id, Request $request)
  {
    //cari artikel
    $article = Article::where([
      ['id', $id],
      ['user_id', $request->user()->id]
    ])->first();
    //jika gagal ambil article
    if (!$article) {
      return APIFormatter::create(404, "Cant get your data!, Something went wrong!");
    }
    //jika ada maka kembalikan response json dengan class bantuan
    return APIFormatter::create(200, "Success", $article);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $dataTervalidasi = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
      'category_id' => 'required'
    ]);
    //tambah array user_id untuk ikut di input
    $dataTervalidasi['user_id'] = $request->user()->id;
    //cari berdasarkan id dan simpan ke variable data
    $data = Article::where([
      ["id", $id], ['user_id', $request->user()->id]
    ]);
    //ambil data sebelum update simpan ke variable sebelum update
    $sebelumUpdate = $data->first();
    //lakukan update dan simpan hasil respon server setlah update pada variable berhasilUpdate
    $berhasilUpdate = $data->update($dataTervalidasi);
    //kalau gagal update
    if (!$berhasilUpdate) {
      return APIFormatter::create(404, "Failed : Data not found!");
    }
    $setelahUpdate = $data->first();

    //kalau berhasil kasih response json dengan data sebelum dan sesudah update
    return APIFormatter::create(200, "Success Update Data!", [
      'from' => $sebelumUpdate,
      'to' => $setelahUpdate
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deletedData = Article::destroy($id);
    if (!$deletedData) {
      return APIFormatter::create(404, "Failed : Something Went Wrong!");
    }
    return APIFormatter::create(200, "Successfully Delete Data!");
  }
}
