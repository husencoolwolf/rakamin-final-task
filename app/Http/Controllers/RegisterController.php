<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function index()
  {
    return view("register", [
      "active" => "register"
    ]);
  }

  public function register(Request $request)
  {
    $dataValidated = $request->validate([
      "name" => "required|max:255",
      "email" => ["required", "email:dns", "unique:users"],
      "password" => ["required", "min:5", "max:255"]
    ]);

    $dataValidated["password"] = Hash::make($dataValidated['password']);

    User::create($dataValidated);

    return redirect("/login")->with("success", "Registration Successfull !, Please Login !");
  }
}
