<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function get(Request $request)
    {
      $user_id = $request->get("uid", 0);
      $user = User::find($user_id);
      return $user;
    }
}
