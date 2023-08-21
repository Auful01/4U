<?php

namespace App\Http\Controllers;

use App\Http\Traits\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use Response;

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->error('Unauthorized', 401);
        }
        return $this->success(['token' => $token], 'Login Success');
    }

    public function logout()
    {
        auth()->logout();
        return $this->success(null, 'Logout Success');
    }

    public function me()
    {
        // dd(Auth::user());
        return $this->success(auth()->user());
    }

    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            DB::commit();
            return $this->success($user, 'User Created', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
}
