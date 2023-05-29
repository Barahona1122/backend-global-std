<?php

namespace App\Http\Controllers\API\App\Admin\Auth;

use App\Admin\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * destroy current session
     * @param Request $request
     * @return
     */
    public function logOut(){
        if (Auth::check()) {
            Auth::user()->token()->revoke();
         }
         return response()->json([
            'message' => 'ok',
            'success' => true
        ]);

        ApiResponse::success();
    }
}
