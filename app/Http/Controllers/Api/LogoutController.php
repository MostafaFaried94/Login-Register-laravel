<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $user->api_token =null;
            $user->save();
            return response()->json(['message'=>'تم تسجيل خروج المستخدم']);
        }
        return response()->json([
            'error' => 'غير قادر على تسجيل خروج المستخدم',
            'code' => 401,

        ], 401);
    }

}
