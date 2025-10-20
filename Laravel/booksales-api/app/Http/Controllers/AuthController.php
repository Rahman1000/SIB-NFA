<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. setup validator
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:customer,admin',
        ]);

        // 2. cek validator
        if ($validator->fails()) {
            return response()->json([$validator->errors(), 422]);
        }

        // 3. create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 4. cek keberhasilan
        if (!$user) {
            return response()->json([
                'success' => true,
                'message' => 'User Created Successfully',
                'data' => $user
            ], 201);
        }

        // 5. cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User Creation Failed',
        ], 409);
    }

    public function login(Request $request)
    {
        // 1. setup validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. cek validator
        if ($validator->fails()) {
            return response()->json([$validator->errors(), 422]);
        }

        // 3. get credentials dari request
        $Credentials = $request->only('email', 'password');

        // 4. cek isfailed
        if (! $token = auth()->guard('api')->attempt($Credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda Salah!',
            ], 401);
        }

        // 5. cek isuccess
        return response()->json([
            'success' => true,
            'message' => 'Login Successfully!',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        // try catch
        // 1. invalidate token
        // 2. cek issuccess

        // catch
        // 1. cek isfailed

        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ], 200);
            
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed'
            ], 500);
        }
    }
}
