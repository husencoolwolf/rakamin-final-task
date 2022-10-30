<?php

namespace App\Helper;

class APIFormatter
{
  protected static $data = [
    'code' => '',
    'message' => '',
    'data' => ''
  ];

  public static function create($code = null, $message = null, $data = null)
  {
    self::$data['code'] = $code;
    self::$data['message'] = $message;
    self::$data['data'] = $data;
    return response()->json(self::$data, self::$data['code']);
  }
}
