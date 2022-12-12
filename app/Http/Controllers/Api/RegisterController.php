<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        /* $data = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'api_token' => Str::random(60),
         ]);
         return $data;*/

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|string',
            'email' => 'required|max:191|string|unique:users',
            'password' => 'required|max:191|string',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'api_token' => Str::random(60),
            ]);
            return $data;
        }

    }
}
