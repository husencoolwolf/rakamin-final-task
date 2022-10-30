<?php

namespace App\Http\Controllers\api\v1;

use App\Helper\APIFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;


class LoginController extends Controller
{
  public function login(Request $request)
  {
    //validasi data
    $dataTervalidasi = $request->validate([
      "email" => 'required',
      'password' => 'required'
    ]);

    //Jika authentikasi gagal
    if (!Auth::attempt($dataTervalidasi)) {
      return APIFormatter::create(400, "Credential Not Valid");
    }


    /** @var \App\Models\User $user **/
    $user = Auth::user();
    $accessToken = $user->createToken("access token")->accessToken;

    return APIFormatter::create(200, "Success Loging in", [
      'user' => $user,
      'access_token' => $accessToken
    ]);
  }

  public function logout(Request $request)
  {
    // $token = $request->validate([
    //   'access_token' => 'required'
    // ]);

    $request->user()->token()->revoke();
  }
}
