<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ApiResponse;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;


class AuthController extends Controller
{

    use ApiResponse;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'password_confirmation' => $request->password_confirmation
        ]);

        return $this->successMessage();
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return ApiResponse::errorMessage('Invalid Email or Password', 401);
        }

        return ApiResponse::successResponse($jwt_token, "token");
    }

    public function logout(): JsonResponse
    {

        auth()->logout();

        return $this->successMessage('User successfully signed out');
    }

    public function getUser(Request $request): JsonResponse
    {
        dd($request->token);
        return ApiResponse::successResponse(\auth());
    }


}
