<?php

namespace App\Http\Controllers\API\App\Customer\Auth;

use App\Admin\Helpers\ApiResponse;
use App\Objects\ErrorMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogInRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Objects\ValuesObject\UserValues;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * create a new session
     * @param LogInRequest $request
     * @return
     */
    public function logIn(LogInRequest $request){
        if(Auth::attempt($request->only(['email', 'password']))){
            $user = Auth::user();
            $tokenInfo = $user->createToken(UserValues::PERSONAL_TOKEN_NAME);
            $token = $tokenInfo->accessToken;
            $expiration = $tokenInfo->token->expires_at->toDateTimeString();

            return ApiResponse::successWithData([
                'token' => $token,
                'expiration' => $expiration
            ]);
        }

        return ApiResponse::error("User or password invalid", "true", Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * create a new session
     * @param RegisterRequest $request
     * @return
     */
    public function register(RegisterRequest $request){
        $userData = [
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "password" => Hash::make($request->get('password'))
        ];

        $user = User::create($userData);

        if(!$user){
            return ApiResponse::error("Error");
        }
        $accessToken = $user->createToken(UserValues::PERSONAL_TOKEN_NAME);
        return ApiResponse::successWithData(["access_token" => $accessToken]);
    }
}
