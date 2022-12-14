<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            $user = auth()->user();
            $user->api_token = Str::random(60);
            $user->save();
            return $user;
        }
        return 'User Not Login';
    }
}
